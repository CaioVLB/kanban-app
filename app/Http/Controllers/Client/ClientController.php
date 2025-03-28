<?php

namespace App\Http\Controllers\Client;

use App\Enums\ProfileEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ClientStoreRequest;
use App\Http\Requests\Client\ClientUpdateRequest;
use App\Http\Resources\Client\ClientResource;
use App\Models\Client;
use App\Models\ClientAddress;
use App\Models\ClientAnnotation;
use App\Models\ClientFile;
use App\Models\ClientPhone;
use App\Models\Evaluation;
use App\Models\State;
use App\Services\ClientService;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientController extends Controller
{

  public function __construct(
    protected ClientService $clientService,
    protected Client $client,
  ){}

  public function index(): View
  {

    $clients = $this->client->with([
      'phones' => function($query) {
        $query->where('main', true)->select('phone_number', 'client_id');
      }
    ])->select('id', 'name', 'cpf', 'email')->get();

    $clientResource = ClientResource::collection($clients);

    return view('client.client', ['clients' => $clientResource]);
  }

  public function store(ClientStoreRequest $request): JsonResponse
  {
    try {
      $validated = $request->validated();

      $client = $this->clientService->storeClient($validated);

      $client->load(['phones']);

      return response()->json([
        'success' => 'Cliente cadastrado com sucesso!',
        'client_created' => new ClientResource($client)
      ], 201);
    } catch (\Exception $e) {
      return response()->json([
        'error' => 'Não foi possível cadastrar o cliente no momento.',
        'exception' => $e->getMessage(),
      ], 500);
    }
  }

  public function show(int $id): View
  {
    $client = $this->client->findOrFail($id);

    $addresses = ClientAddress::with([
      'city:id,city',
      'state:id,abbreviation'
    ])->where('client_id', $id)
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

    $phones = ClientPhone::where('client_id', $id)
    ->orderBy('id', 'desc')
    ->select([
      'id',
      'main',
      'identifier',
      'phone_number'
    ])->get();

    $evaluations = Evaluation::with(['collaborator' => function ($query) {
        $query->select('id', 'user_id');
      }, 'collaborator.user' => function ($query) {
        $query->select('id', 'name');
      }])->where('client_id', $id)
      ->select('id', 'evaluation_name', 'client_id', 'type', 'collaborator_id', 'date')
      ->orderBy('created_at', 'desc')
      ->get()
      ->groupBy('type')
      ->mapWithKeys(function ($group, $type) {
        // Para cada tipo, cria um array com o nome do tipo como chave
        return [
          strtolower($type) => $group
        ];
      });

    $notes = ClientAnnotation::with([
      'createdBy:id,name'
    ])->where('client_id', $id)
    ->orderBy('id', 'desc')
    ->select([
      'id',
      'content',
      'by_user_id',
      'created_at'
    ])->get();

    $files = ClientFile::with([
      'createdBy:id,name'
    ])->where('client_id', $id)
    ->orderBy('id', 'desc')
    ->select([
      'id',
      'content',
      'original_name',
      'by_user_id',
      'created_at'
    ])->get();

    return view('client.client-dashboard', [
      'client' => $client,
      'addresses' => $addresses,
      'states' => $states,
      'phones' => $phones,
      'physiotherapy' => $evaluations->get('physiotherapy', []),
      'neurological' => $evaluations->get('neurological', []),
      'respiratory' => $evaluations->get('respiratory', []),
      'orthopedic' => $evaluations->get('orthopedic', []),
      'notes' => $notes,
      'files' => $files,
    ]);
  }

  public function update(ClientUpdateRequest $request, int $id): RedirectResponse
  {
    try {
      $validated = $request->validated();
      $client = $this->client->findOrFail($id);

      // Serviço para atualizar os dados do cliente
      $this->clientService->updateClient($client, $validated);

      return redirect()->back()->with(['success' => 'Dados do cliente atualizados com sucesso!']);
    } catch (QueryException $e) {
      return redirect()->back()->withErrors(['error' => 'Falha ao atualizar os dados do cliente.']);
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Ocorreu um problema inesperado.']);
    }
  }

  public function storeNotes(Request $request, int $id): RedirectResponse
  {
    try {
      $request->validate([
        'client_annotation' => ['required', 'string', 'max:255']
      ]);

      ClientAnnotation::create([
        'content' => $request->client_annotation,
        'client_id' => $id,
        'by_user_id' => auth()->user()->id
      ]);

      return redirect()->back()->with(['success' => 'Anotação realizada com sucesso!']);
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Ocorreu um problema no cadastramento da anotação.']);
    }
  }

  public function destroyNotes(int $note_id): RedirectResponse
  {
    try {
      $note = ClientAnnotation::findOrFail($note_id);

      if(auth()->user()->profile_id === ProfileEnum::MANAGER || auth()->user()->id === $note->by_user_id) {

        $note->delete();

        return redirect()->back()->with(['success' => 'Anotação excluída com sucesso!']);
      }

      return redirect()->back()->withErrors(['error' => 'Você não tem permissão para excluir essa anotação.']);

    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Ocorreu um problema na exclusão da anotação.']);
    }
  }
}
