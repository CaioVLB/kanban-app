<?php

namespace App\Http\Controllers;

use App\Enums\ProfileEnum;
use App\Http\Requests\CollaboratorRequest;
use App\Http\Resources\CollaboratorResource;
use App\Models\Collaborator;
use App\Models\CollaboratorPhone;
use App\Models\Paper;
use App\Models\User;
use Illuminate\Http\JsonResponse;
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
      /*->map(function($collaborator) {
        $collaborator->name = $collaborator->user->name;
        $collaborator->cpf = $collaborator->user->cpf;
        $collaborator->email = $collaborator->user->email;
        $collaborator->paper = $collaborator->paper->paper;
        $collaborator->phone_number = $collaborator->phones->isNotEmpty()
          ? $collaborator->phones->first()->phone_number : '---';

        $collaborator->unsetRelation('user');
        $collaborator->unsetRelation('paper');
        $collaborator->unsetRelation('phones');

        return $collaborator;
      });

    $papers = Paper::all(['id', 'paper']);

    return view('collaborator.collaborator', compact('collaborators', 'papers'));*/
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
        /*'collaborator_created' => [
          'id' => $collaborator->id,
          'name' => $collaborator->user->name,
          'cpf' => $collaborator->user->cpf,
          'email' => $collaborator->user->email,
          'phone_number' => $collaborator->phones->first()->phone_number,
          'paper_id' => $collaborator->paper->id,
          'paper' => $collaborator->paper->paper,
          'active' => $collaborator->active,
        ],*/
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
    return view('collaborator.collaborator-dashboard', compact('id'));
  }
}
