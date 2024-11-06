<?php

namespace App\Http\Controllers;

use App\Http\Requests\CollaboratorRequest;
use App\Models\Collaborator;
use App\Models\Role;
use Illuminate\View\View;

class CollaboratorController extends Controller
{
  public function index(): View
  {
    $collaborators = Collaborator::with('role')->get(['id', 'name', 'email', 'phone_number', 'role_id']);
    $roles = Role::all(['id', 'name']);
    return view('collaborator.collaborator', compact('collaborators', 'roles'));
  }

  public function store(CollaboratorRequest $request)
  {
    try {
      $validated = $request->validated();

      $data = [
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone_number' => $validated['phone_number'],
        'role_id' => $validated['role_id'],
      ];

      $collaborator = Collaborator::create($data);
      $collaborator->load('role');

      return response()->json([
        'success' => 'Colaborador cadastrado com sucesso',
        'collaborator_created' => [
          'id' => $collaborator->id,
          'name' => $collaborator->name,
          'email' => $collaborator->email,
          'phone_number' => $collaborator->phone_number,
          'role' => $collaborator->role->name,
        ]
      ], 201);
    } catch (\Exception $e) {
      return response()->json([
        'processing_failure' => 'Não foi possível cadastrar o colaborador no momento.',
        'exception' => $e->getMessage(),
      ], 500);
    }
  }

  public function show(int $id): View
  {
    return view('collaborator.collaborator-dashboard', compact('id'));
  }
}
