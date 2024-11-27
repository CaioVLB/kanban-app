<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Paper;
use Illuminate\View\View;
use \Illuminate\Database\Eloquent\ModelNotFoundException;

class RoleController extends Controller
{
  public function index(): View
  {
    $papers = Paper::all('id', 'name');
    return view('role.role', compact('papers'));
  }

  public function store(RoleRequest $request)
  {
    try {
      $paper = Paper::create($request->validated());

      return response()->json([
        'success' => 'Cargo criado com sucesso',
        'paper_created' => ['id' => $paper->id, 'name' => $paper->name]
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
        'paper_updated' => ['id' => $paper->id, 'name' => $paper->name]
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
      $paper->delete();

      return response()->json(['success' => 'Cargo excluído com sucesso'], 200);
    } catch (ModelNotFoundException $e) {
      return response()->json(['errors' => 'Cargo não encontrado.'], 404);
    } catch (\Exception $e) {
      return response()->json(['errors' => 'Não foi possível excluir o cargo no momento.'], 500);
    }
  }

}
