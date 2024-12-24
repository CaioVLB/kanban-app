<?php

namespace App\Http\Controllers\Client;

use App\Enums\ProfileEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\FileRequest;
use App\Models\ClientFile;
use App\Services\ClientService;
use Illuminate\Http\RedirectResponse;

class FileController extends Controller
{
  public function __construct(
    protected ClientService $clientService,
  ){}

  public function store(FileRequest $request, int $client_id): RedirectResponse
  {
    try {
      $validated = $request->validated();

      if (!($request->hasFile('file_input') && $request->file('file_input')->isValid())) {
        return redirect()->back()->withErrors(['error' => 'Selecione um arquivo válido!']);
      }

      $this->clientService->storeFile($validated, $client_id);

      return redirect()->back()->with(['success' => 'Arquivo cadastrado com sucesso!']);
    } catch (\Exception $e) {
      dd($e);
      return redirect()->back()->withErrors(['error' => 'Não foi possível cadastrar o arquivo no momento.']);
    }
  }

  public function destroy(int $id): RedirectResponse
  {
    try {
      $file = ClientFile::findOrFail($id);

      if(auth()->user()->profile_id !== ProfileEnum::MANAGER && auth()->user()->id !== $file->by_user_id) {
        return redirect()->back()->withErrors(['error' => 'Você não tem permissão para excluir esse arquivo.']);
      }

      $file->delete();

      return redirect()->back()->with(['success' => 'Arquivo excluído com sucesso!']);
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Ocorreu um problema na exclusão do arquivo.']);
    }
  }
}
