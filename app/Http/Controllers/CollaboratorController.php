<?php

namespace App\Http\Controllers;

use App\Http\Requests\CollaboratorRequest;
use App\Models\Collaborator;
use App\Models\Paper;
use Illuminate\View\View;

class CollaboratorController extends Controller
{
  public function index(): View
  {
    $collaborators = Collaborator::with('paper')->get(['id', 'name', 'email', 'phone_number', 'paper_id']);
    $papers = Paper::all(['id', 'name']);
    return view('collaborator.collaborator', compact('collaborators', 'papers'));
  }

  public function store(CollaboratorRequest $request)
  {
    try {
      $validated = $request->validated();

      $data = [
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone_number' => $validated['phone_number'],
        'paper_id' => $validated['paper_id'],
      ];

      $collaborator = Collaborator::create($data);
      $collaborator->load('paper');

      return response()->json([
        'success' => 'Colaborador cadastrado com sucesso',
        'collaborator_created' => [
          'id' => $collaborator->id,
          'name' => $collaborator->name,
          'email' => $collaborator->email,
          'phone_number' => $collaborator->phone_number,
          'paper' => $collaborator->paper->name,
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
