<?php

namespace App\Http\Controllers\Collaborator;

use App\Enums\ProfileEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\CollaboratorRequest;
use App\Http\Resources\CollaboratorResource;
use App\Models\Collaborator;
use App\Models\CollaboratorAnnotation;
use App\Models\Paper;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class CollaboratorController extends Controller
{
  public function index(): View
  {

    $collaborators = Collaborator::with([
      'user:id,name,cpf,email',
      'paper:id,paper',
      'phones' => function($query) {
        $query->where('main', true)->select('phone_number', 'collaborator_id');
      }
    ])->select('id', 'user_id', 'paper_id', 'active')->get();

    $collaboratorsResource = CollaboratorResource::collection($collaborators);

    return view('collaborator.collaborator', [
      'collaborators' => $collaboratorsResource,
      'papers' => Paper::all(['id', 'paper'])
    ]);
  }


  public function store(CollaboratorRequest $request): JsonResponse
  {
    try {
      $validated = $request->validated();

      $validated['company_id'] = $request->get('company_id');

      DB::transaction(function () use (&$collaborator, $validated) {
         $user = User::create([
           'name' => $validated['name'],
           'cpf' => $validated['cpf'],
           'email' => $validated['email'],
           'password' => Hash::make('password'),
           'company_id' => $validated['company_id'],
           'profile_id' => ProfileEnum::COLLABORATOR,
         ]);

         $collaborator = $user->collaborators()->create([
           'paper_id' => $validated['paper_id'],
           //'company_id' => $validated['company_id'],
           'active' => true
         ]);

         $collaborator->phones()->create([
           'main' => true,
           'identifier' => 'Número informado no cadastramento',
           'phone_number' => $validated['phone_number'],
         ]);
      });

      $collaborator->load(['user', 'paper', 'phones']);

      return response()->json([
        'success' => 'Colaborador cadastrado com sucesso!',
        'collaborator_created' => new CollaboratorResource($collaborator)
      ], 201);
    } catch (\Exception $e) {
      return response()->json([
        'error' => 'Não foi possível cadastrar o colaborador no momento.',
        'exception' => $e->getMessage(),
      ], 500);
    }
  }

  public function show(int $id): View
  {
    $notes = CollaboratorAnnotation::where('collaborator_id', $id)->with(['createdBy:id,name'])->orderBy('id', 'desc')->get(['id', 'content', 'by_user_id', 'created_at']);

    return view('collaborator.collaborator-dashboard', compact('id', 'notes'));
  }

  public function storeNotes(Request $request, int $id): RedirectResponse
  {
    try {
      $request->validate([
        'collaborator_annotation' => ['required', 'string', 'max:255']
      ]);

      CollaboratorAnnotation::create([
        'content' => $request->collaborator_annotation,
        'collaborator_id' => $id,
        'by_user_id' => auth()->user()->id
      ]);

      return redirect()->back()->with(['success' => 'Anotação realizada com sucesso!']);
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(["error" => 'Ocorreu um problema no cadastramento da anotação.']);
    }
  }

  public function destroyNotes(int $note_id): RedirectResponse
  {
    try {
      CollaboratorAnnotation::findOrFail($note_id)->delete();

      return redirect()->back()->with(['success' => 'Anotação excluída com sucesso!']);
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(["error" => 'Ocorreu um problema na exclusão da anotação.']);
    }
  }
}
