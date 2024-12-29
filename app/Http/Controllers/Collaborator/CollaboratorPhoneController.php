<?php

namespace App\Http\Controllers\Collaborator;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhoneRequest;
use App\Models\CollaboratorPhone;
use App\Services\CollaboratorService;
use Illuminate\Http\RedirectResponse;

class CollaboratorPhoneController extends Controller
{
  public function __construct(
    protected CollaboratorService $collaboratorService,
  ){}

  public function store(PhoneRequest $request, int $collaborator_id): RedirectResponse
  {
    try {
      $validated = $request->validated();

      $this->collaboratorService->storePhone($validated, $collaborator_id);

      return redirect()->back()->with(['success' => 'Telefone cadastrado com sucesso!']);
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Não foi possível cadastrar o telefone no momento.']);
    }
  }

  public function destroy(int $id): RedirectResponse
  {
    try {
      CollaboratorPhone::findOrFail($id)->delete();

      return redirect()->back()->with(['success' => 'Telefone excluído com sucesso!']);
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Ocorreu um problema na exclusão do telefone.']);
    }
  }
}
