<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\View\View;
use \Illuminate\Database\Eloquent\ModelNotFoundException;

class RoleController extends Controller
{
  public function index(): View
  {
    $roles = Role::all('id', 'name');
    return view('role.role', compact('roles'));
  }

  public function store(RoleRequest $request)
  {
    try {
      $role = Role::create($request->validated());

      return response()->json([
        'success' => 'Cargo criado com sucesso',
        'role_created' => ['id' => $role->id, 'name' => $role->name]
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

      $role = Role::findOrFail($request->id);

      $role->update($data);

      return response()->json([
        'success' => 'Cargo atualizado com sucesso',
        'role_updated' => ['id' => $role->id, 'name' => $role->name]
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
      $role = Role::findOrFail($id);
      $role->delete();

      return response()->json(['success' => 'Cargo excluído com sucesso'], 200);
    } catch (ModelNotFoundException $e) {
      return response()->json(['errors' => 'Cargo não encontrado.'], 404);
    } catch (\Exception $e) {
      return response()->json(['errors' => 'Não foi possível excluir o cargo no momento.'], 500);
    }
  }

}
