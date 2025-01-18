<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\EvaluationsRequest;
use App\Models\Client;
use App\Models\Collaborator;
use App\Models\Evaluation;
use App\Services\EvaluationService;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class EvaluationController extends Controller
{
  public function __construct(
    protected EvaluationService $evaluationService,
    protected Collaborator $collaborator,
  ) {}

  public function evaluations(EvaluationsRequest $request, int $client_id, string $type): View|RedirectResponse
  {
    if (!$this->evaluationService->validateEvaluationType($type)) {
      return redirect()->back()->withErrors(['error' => 'Avaliação não encontrada.']);
    }

    $client = $this->evaluationService->validateClient($client_id);
    if (!$client) {
      return redirect()->back()->withErrors(['error' => 'Cliente não encontrado!']);
    }

    $collaborator_id = $this->evaluationService->getAuthenticatedCollaborator();

    $data = [
      'evaluation_name' => $request->validated()['evaluation_name'],
      'client_id' => $client_id,
      'type' => $type,
      'collaborator_id' => $collaborator_id,
      'date' => date('Y-m-d'),
    ];

    $this->store($data, $type);

    $collaborators = $this->collaborator
      ->with(['user:id,name'])
      ->select('id', 'user_id')
      ->get();

    $viewName = $this->evaluationService->getViewName($type);

    return view($viewName, compact('client', 'collaborators'));
  }

  protected function store(array $data, string $type): Evaluation|RedirectResponse
  {
    try {
      return $this->evaluationService->storeEvaluation($data, $type);
    } catch (QueryException $e) {
      return redirect()->back()->withErrors(['error' => 'Não foi possível criar a avaliação. Verifique os dados e tente novamente.']);
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Ocorreu um problema inesperado. Tente novamente em alguns minutos.']);
    }
  }
}
