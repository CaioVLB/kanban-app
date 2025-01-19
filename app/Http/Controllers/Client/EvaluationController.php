<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\EvaluationsRequest;
use App\Models\Collaborator;
use App\Models\Evaluation;
use App\Services\EvaluationService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EvaluationController extends Controller
{
  public function __construct(
    protected EvaluationService $evaluationService,
    protected Evaluation $evaluation,
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

    $collaborators = $this->collaborator->getAllCollaborators();

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

  public function updateEvaluationName(Request $request, int $client_id, int $evaluation_id, string $type): View|RedirectResponse
  {
    $request->validate([
      'evaluation_name' => 'required|string|max:255',
    ], [
      'evaluation_name.required' => 'O nome da ficha é obrigatório.',
      'evaluation_name.string' => 'O nome da ficha deve ser um texto válido.',
      'evaluation_name.max' => 'O nome da ficha não pode ter mais que 255 caracteres.',
    ]);

    try {
      $client = $this->evaluationService->validateClient($client_id);
      if (!$client) {
        return redirect()->back()->withErrors(['error' => 'Cliente não encontrado!']);
      }

      $evaluation = $this->evaluation->findEvaluationWithRelation($evaluation_id, $type);

      if ($this->evaluationService->authorizeActionEvaluation($evaluation)) {
        $newEvaluationName = $request->evaluation_name;
        if ($evaluation->evaluation_name !== $newEvaluationName) {
          $evaluation->update(['evaluation_name' => $newEvaluationName]);
        }

        $collaborators = $this->collaborator->getAllCollaborators();

        $viewName = $this->evaluationService->getViewName($type);

        return view($viewName, compact('client', 'collaborators', 'evaluation'));
      }

      return redirect()->back()->withErrors(['error' => 'Você não tem permissão para atualizar essa avaliação. Entre em contato com o profissional responsável pela avaliação ou com administrador.']);

    } catch (QueryException $e) {
      return redirect()->back()->withErrors(['error' => 'Não foi possível atualizar a avaliação. Verifique os dados e tente novamente.']);
    } catch (\Exception $e) {
      dd($e->getMessage());
      return redirect()->back()->withErrors(['error' => 'Ocorreu um problema inesperado. Tente novamente em alguns minutos.']);
    }
  }

  public function destroy(int $evaluation_id, $type): RedirectResponse
  {
    try {
      $evaluation = $this->evaluation->findEvaluationValidation($evaluation_id, $type);

      if ($this->evaluationService->authorizeActionEvaluation($evaluation)) {
        $evaluation->delete();
        return redirect()->back()->with(['success' => 'Avaliação excluída com sucesso!']);
      }

      return redirect()->back()->withErrors(['error' => 'Você não tem permissão para excluir essa avaliação. Entre em contato com o profissional responsável pela avaliação ou com administrador.']);

    } catch (ModelNotFoundException $e) {
      return redirect()->back()->with('error', 'Avaliação não encontrada!');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Ocorreu um problema inesperado na exclusão da avaliação. Tente novamente em alguns minutos.']);
    }
  }
}
