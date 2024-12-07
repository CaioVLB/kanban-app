<?php

namespace App\Http\Controllers;

use App\Enums\ProfileEnum;
use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use App\Models\ClientAnnotation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
class ClientController extends Controller
{
  public function index(): View
  {

    $clients = Client::with([
      'phones' => function($query) {
        $query->where('main', true)->select('phone_number', 'client_id');
      }
    ])->select('id', 'name', 'cpf', 'email')->get();

    $clientResource = ClientResource::collection($clients);

    return view('client.client', ['clients' => $clientResource]);
  }

  public function store(ClientRequest $request): JsonResponse
  {
    try {
      $validated = $request->validated();

      $validated['company_id'] = $request->get('company_id');

      DB::transaction(function () use (&$client, $validated) {
        $client = Client::create([
          'name' => $validated['name'],
          'cpf' => $validated['cpf'],
          'email' => $validated['email']
        ]);

        $client->phones()->create([
          'main' => true,
          'identifier' => 'Número informado no cadastramento',
          'phone_number' => $validated['phone_number'],
        ]);
      });

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
    $notes = ClientAnnotation::where('client_id', $id)->with(['createdBy:id,name'])->orderBy('id', 'desc')->get(['id', 'content', 'by_user_id', 'created_at']);

    return view('client.client-dashboard', compact('id', 'notes'));
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
      return redirect()->back()->withErrors(["error" => 'Ocorreu um problema no cadastramento da anotação.']);
    }
  }

  public function destroyNotes(int $note_id): RedirectResponse
  {
    try {
      ClientAnnotation::findOrFail($note_id)->delete();

      return redirect()->back()->with(['success' => 'Anotação excluída com sucesso!']);
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(["error" => 'Ocorreu um problema na exclusão da anotação.']);
    }
  }
}
