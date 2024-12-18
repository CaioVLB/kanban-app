<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\AddressRequest;
use App\Models\ClientAddress;
use Illuminate\Http\RedirectResponse;

class AddressController extends Controller
{

  public function store(AddressRequest $request, int $id): RedirectResponse
  {
    try {
      $validated = $request->validated();

      ClientAddress::create([
        'client_id' => $id,
        'main' => false,
        'description' => $validated['description'],
        'zipcode' => $validated['zipcode'],
        'street' => $validated['street'],
        'number' => $validated['number'] ?? 'S/N',
        'neighborhood' => $validated['neighborhood'],
        'city_id' => $validated['city'],
        'state_id' => $validated['state'],
        'country_id' => 1,
      ]);

      return redirect()->back()->with(['success' => 'Endereço cadastrado com sucesso!']);
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Não foi possível cadastrar um endereço no momento.']);
    }
  }

  public function destroy(int $id): RedirectResponse
  {
    try {
      ClientAddress::findOrFail($id)->delete();

      return redirect()->back()->with(['success' => 'Endereço excluído com sucesso!']);
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Ocorreu um problema na exclusão do Endereço.']);
    }
  }
}
