<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ClientAddress;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AddressController extends Controller
{

  public function store(ClientRequest $request, int $id): JsonResponse
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

  public function destroy(int $int): RedirectResponse
  {
    try {
      ClientAnnotation::findOrFail($int)->delete();

      return redirect()->back()->with(['success' => 'Anotação excluída com sucesso!']);
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(["error" => 'Ocorreu um problema na exclusão da anotação.']);
    }
  }
}
