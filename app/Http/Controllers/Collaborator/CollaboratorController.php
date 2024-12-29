<?php

namespace App\Http\Controllers\Collaborator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Collaborator\CollaboratorStoreRequest;
use App\Http\Requests\Collaborator\CollaboratorUpdateRequest;
use App\Http\Resources\CollaboratorResource;
use App\Models\Collaborator;
use App\Models\CollaboratorAddress;
use App\Models\CollaboratorAnnotation;
use App\Models\CollaboratorFile;
use App\Models\CollaboratorPhone;
use App\Models\Paper;
use App\Models\State;
use App\Models\User;
use App\Services\CollaboratorService;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CollaboratorController extends Controller
{

  public function __construct(
    protected CollaboratorService $collaboratorService,
  ){}

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


  public function store(CollaboratorStoreRequest $request): JsonResponse
  {
    try {
      $validated = $request->validated();
      $validated['company_id'] = $request->get('company_id');

      $collaborator = $this->collaboratorService->storeCollaborator($validated);

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
    $collaborator = Collaborator::with([
      'user:id,name,cpf,email',
    ])->select([
      'id',
      'hire_date',
      'birthdate',
      'nationality',
      'gender',
      'marital_status',
      'user_id',
      'paper_id',
    ])->findOrFail($id);

    $papers = Paper::all(['id', 'paper']);

    $addresses = CollaboratorAddress::with([
      'city:id,city',
      'state:id,abbreviation'
    ])->where('collaborator_id', $id)
      ->orderBy('id', 'desc')
      ->select([
        'id',
        'main',
        'description',
        'zipcode',
        'street',
        'number',
        'neighborhood',
        'city_id',
        'state_id'
      ])->get();

    $states = State::all();

    $phones = CollaboratorPhone::where('collaborator_id', $id)
      ->orderBy('id', 'desc')
      ->select([
        'id',
        'main',
        'identifier',
        'phone_number'
      ])->get();

    $notes = CollaboratorAnnotation::with([
      'createdBy:id,name'
    ])->where('collaborator_id', $id)
      ->orderBy('id', 'desc')
      ->select([
        'id',
        'content',
        'by_user_id',
        'created_at'
      ])->get();

    $files = CollaboratorFile::with([
      'createdBy:id,name'
    ])->where('collaborator_id', $id)
      ->orderBy('id', 'desc')
      ->select([
        'id',
        'content',
        'original_name',
        'by_user_id',
        'created_at'
      ])->get();

    return view('collaborator.collaborator-dashboard', compact('collaborator', 'papers', 'addresses', 'states', 'phones', 'notes', 'files'));
  }

  public function update(CollaboratorUpdateRequest $request, int $collaborator_id): RedirectResponse
  {
    try {
      $validated = $request->validated();
      $collaborator = Collaborator::with(['user:id,name,cpf,email'])->findOrFail($collaborator_id);

      $this->collaboratorService->updateCollaborator($collaborator, $validated);

      return redirect()->back()->with(['success' => 'Dados do colaborador atualizados com sucesso!']);
    } catch (QueryException $e) {
      return redirect()->back()->withErrors(['error' => 'Falha ao atualizar os dados do colaborador.']);
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Ocorreu um problema inesperado.']);
    }
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
