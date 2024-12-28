<?php

namespace App\Http\Controllers\Client;

use App\Enums\ProfileEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\FileRequest;
use App\Models\ClientFile;
use App\Services\ClientService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileController extends Controller
{
  public function __construct(
    protected ClientService $clientService,
    protected ClientFile $cf
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
      return redirect()->back()->withErrors(['error' => 'Não foi possível cadastrar o arquivo no momento.']);
    }
  }

  public function view(int $id): JsonResponse
  {
    $file = $this->cf->findOrFail($id);

    if ($file->size > 5 * 1024 * 1024) { // 5 MB
      return response()->json(['error' => 'O arquivo é muito grande para ser carregado.'], 413);
    }

    $filePath = Storage::disk('private')->path($file->path);

    if (!file_exists($filePath)) {
      return response()->json(['error' => 'Arquivo não encontrado.'], 404);
    }

    $fileContents = file_get_contents($filePath);
    if ($fileContents === false) {
      return response()->json(['error' => 'Não foi possível ler o arquivo.'], 500);
    }

    $base64 = base64_encode($fileContents);

    return response()->json([
      'file' => 'data:' . $file->type . ';base64,' . $base64,
      'mimeType' => $file->type,
    ]);
  }

  public function download(Request $request, int $id): StreamedResponse
  {

    if (auth()->user()->company_id !== $request->session()->get('company_id')) {
      abort(403, 'Access denied');
    }

    $file = $this->cf->findOrFail($id);

    $storagePath = storage_path('app/private');
    $filePath = realpath($storagePath . '/' . $file->path);

    $normalizedStoragePath = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $storagePath);
    $normalizedFilePath = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $filePath);

    if (!Storage::drive('private')->exists($file->path) || !$filePath || strpos($normalizedFilePath, $normalizedStoragePath) !== 0) {
      abort(404);
    }

    return Storage::drive('private')->download($file->path);
  }

  public function destroy(int $id): RedirectResponse
  {
    try {
      $file = $this->cf->findOrFail($id);

      if(auth()->user()->profile_id === ProfileEnum::MANAGER || auth()->user()->id === $file->by_user_id) {

        if (!Storage::disk('private')->exists($file->path)) {
          return redirect()->back()->withErrors(['error' => 'O arquivo solicitado não foi encontrado.']);
        }

        if (!Storage::disk('private')->delete($file->path)) {
          return redirect()->back()->withErrors(['error' => 'Não foi possível excluir o arquivo do armazenamento.']);
        }

        $file->delete();

        return redirect()->back()->with(['success' => 'Arquivo excluído com sucesso!']);
      }

      return redirect()->back()->withErrors(['error' => 'Você não tem permissão para excluir esse arquivo.']);

    } catch (ModelNotFoundException $e) {
      return redirect()->back()->withErrors(['error' => 'Registro do arquivo não encontrado na base de dados.']);
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Ocorreu um problema na exclusão do arquivo. Entre em contato com o suporte.']);
    }
  }
}
