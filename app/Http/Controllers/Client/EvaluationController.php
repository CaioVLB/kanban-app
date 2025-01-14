<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Collaborator;
use App\Models\EvaluationCharacteristic;
use App\Services\EvaluationService;

class EvaluationController extends Controller
{
  public function __construct(
    protected EvaluationService $evaluationService,
    protected EvaluationCharacteristic $ec,
    protected Client $client,
    protected Collaborator $collaborator,
  ){}

  public function physiotherapy(int $id)
  {
    $client = $this->client->basicCustomerData($id);
    if (!$client) {
      return redirect()->back()->withErrors(['error' => 'Client não encontrado!']);
    }
    $collaborators = $this->collaborator->with(['user:id,name'])->select('id', 'user_id')->get();

    return view('evaluations.physiotherapy', compact('client', 'collaborators'));
  }

  public function neuro(int $id)
  {
    $client = $this->client->basicCustomerData($id);
    if (!$client) {
      return redirect()->back()->withErrors(['error' => 'Client não encontrado!']);
    }
    $collaborators = $this->collaborator->with(['user:id,name'])->select('id', 'user_id')->get();

    return view('evaluations.neuro', compact('client', 'collaborators'));
  }

  public function respiratory(int $id)
  {
    $client = $this->client->basicCustomerData($id);
    if (!$client) {
      return redirect()->back()->withErrors(['error' => 'Client não encontrado!']);
    }
    $collaborators = $this->collaborator->with(['user:id,name'])->select('id', 'user_id')->get();

    return view('evaluations.respiratory', compact('client', 'collaborators'));
  }

  public function orthopedic(int $id)
  {
    $client = $this->client->basicCustomerData($id);
    if (!$client) {
      return redirect()->back()->withErrors(['error' => 'Client não encontrado!']);
    }
    $collaborators = $this->collaborator->with(['user:id,name'])->select('id', 'user_id')->get();

    return view('evaluations.orthopedic', compact('client', 'collaborators'));
  }
}
