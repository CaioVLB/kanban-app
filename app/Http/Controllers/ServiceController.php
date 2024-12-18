<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Paper;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
  public function index(): View
  {
    $papers = Paper::all('id', 'paper');
    return view('service.service', compact('papers'));
  }

  public function store(RoleRequest $request)
  {
    try {
      $paper = Paper::create($request->validated());

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

      $paper = Paper::findOrFail($request->id);

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
      $paper = Paper::findOrFail($id);

      if ($paper->collaborators->isNotEmpty()) {
        return response()->json(['errors' => 'A exclusão deste cargo não será possível devido a colaboradores associados.'], 400);
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
