<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\PhoneRequest;
use App\Models\ClientPhone;
use App\Services\ClientService;
use Illuminate\Http\RedirectResponse;

class PhoneController extends Controller
{
  public function __construct(
    protected ClientService $clientService,
  ){}

  public function store(PhoneRequest $request, int $client_id): RedirectResponse
  {
    try {
      $validated = $request->validated();

      $this->clientService->storePhone($validated, $client_id);

      return redirect()->back()->with(['success' => 'Telefone cadastrado com sucesso!']);
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Não foi possível cadastrar o telefone no momento.']);
    }
  }

  public function destroy(int $id): RedirectResponse
  {
    try {
      ClientPhone::findOrFail($id)->delete();

      return redirect()->back()->with(['success' => 'Telefone excluído com sucesso!']);
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Ocorreu um problema na exclusão do telefone.']);
    }
  }
}
