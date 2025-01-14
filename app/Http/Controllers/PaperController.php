<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Paper;
use Illuminate\View\View;
use \Illuminate\Database\Eloquent\ModelNotFoundException;

class PaperController extends Controller
{

  public function __construct(
    protected Paper $paper
  ){}
  public function index(): View
  {
    $papers = $this->paper->withCount('collaborators')
      ->orderByDesc('id')
      ->get();

    return view('paper.paper', compact('papers'));
  }

  public function store(RoleRequest $request)
  {
    try {
      $paper = $this->paper::create($request->validated());

      return response()->json([
        'success' => 'Cargo criado com sucesso',
        'paper_created' => ['id' => $paper->id, 'paper' => $paper->paper]
      ], 201);
    } catch (\Exception $e) {
      return response()->json([
        'errors' => 'Não foi possível criar o cargo no momento.',
      ], 500);
    }
  }

  public function update(RoleRequest $request)
  {
    try {
      $data = $request->validated();

      $paper = $this->paper::findOrFail($request->id);

      $paper->update($data);

      return response()->json([
        'success' => 'Cargo atualizado com sucesso',
        'paper_updated' => ['id' => $paper->id, 'paper' => $paper->paper]
      ], 200);
    } catch (ModelNotFoundException $e) {
      return response()->json([
        'errors' => 'Cargo não encontrado.',
      ], 404);
    } catch (\Exception $e) {
      return response()->json([
        'errors' => 'Não foi possível atualizar o cargo no momento.'
      ], 500);
    }
  }

  public function destroy(int $id)
  {
    try {
      $paper = $this->paper::findOrFail($id);

      if ($paper->collaborators->isNotEmpty()) {
        return response()->json(['errors' => 'Não é possível excluir este cargo porque há colaboradores vinculados a ele.'], 400);
      }

      $paper->delete();

      return response()->json(['success' => 'Cargo excluído com sucesso']);
    } catch (ModelNotFoundException $e) {
      return response()->json(['errors' => 'Cargo não encontrado.'], 404);
    } catch (\Exception $e) {
      return response()->json(['errors' => 'Não foi possível excluir o cargo no momento.'], 500);
    }
  }

}
