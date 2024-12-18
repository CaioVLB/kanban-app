<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\PhoneRequest;
use App\Models\ClientPhone;
use Illuminate\Http\RedirectResponse;

class PhoneController extends Controller
{

  public function store(PhoneRequest $request, int $id): RedirectResponse
  {
    try {
      $validated = $request->validated();

      ClientPhone::create([
        'client_id' => $id,
        'main' => false,
        'identifier' => $validated['identifier'],
        'phone_number' => $validated['phone_number'],
      ]);

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
