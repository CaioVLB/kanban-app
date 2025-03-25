<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\EvolutionRequest;
use App\Models\Client;
use App\Models\Collaborator;
use App\Models\Evaluation;
use App\Models\EvaluationEvolutions;
use App\Services\EvaluationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EvaluationEvolutionController extends Controller
{
  public function __construct(
    protected EvaluationService $evaluationService,
    protected EvaluationEvolutions $evolution,
    protected Evaluation $evaluation,
    protected Collaborator $collaborator,
  ){}

  public function evolutionsList(int $client_id, string $type, int $evaluation_id): View|RedirectResponse
  {
    try {
      $client = $this->evaluationService->validateClient($client_id);
      if (!$client) {
        return redirect()->back()->withErrors(['error' => 'Cliente não encontrado!']);
      }

      $evaluation = $this->evaluation->findEvaluationWithRelation($evaluation_id, $type);

      if ($this->evaluationService->authorizeActionEvaluation($evaluation)) {
        $evolutions = $this->evolution->where('evaluation_id', $evaluation_id)->get();

        $collaborators = $this->collaborator->getAllCollaborators();

        $viewName = $this->evaluationService->getViewName($type);

        return view($viewName, compact('client', 'collaborators', 'evaluation', 'evolutions'));
      }

      return redirect()->back()->withErrors(['error' => 'Você não tem permissão para acessar as evoluções desta avaliação. Entre em contato com o profissional responsável pela avaliação ou com o administrador.']);

    } catch (ModelNotFoundException $e) {
      return redirect()->back()->withErrors(['error' => 'Avaliação não encontrada!']);
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Ocorreu um erro ao acessar as evoluções. Tente novamente mais tarde ou contate o suporte.']);
    }
  }

  public function store(EvolutionRequest $request, int $evaluation_id): RedirectResponse
  {
    try {
      $data = $request->validated();

      $this->evolution->create([
        'evolution_date' => $data['evolution_date'],
        'observations' => $data['observations'],
        'next_steps' => $data['next_steps'] ?? null,
        'evaluation_id' => $evaluation_id,
      ]);

      return redirect()->back()->with('success', 'Evolução cadastrada com sucesso!');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Ocorreu um problema no cadastramento da Evolução. Tente novamente em alguns minutos ou contate o suporte.']);
    }
  }

  public function update(EvolutionRequest $request, int $id): RedirectResponse
  {
    try {
      $data = $request->validated();

      $evolution = $this->evolution->findOrFail($id);

      $evolution->update([
        'evolution_date' => $data['evolution_date'],
        'observations' => $data['observations'],
        'next_steps' => $data['next_steps'] ?? null,
      ]);

      return redirect()->back()->with('success', 'Evolução atualizada com sucesso!');
    } catch (ModelNotFoundException $e) {
      return redirect()->back()->with(['error' => 'Evolução não encontrada!']);
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Ocorreu um problema na atualização da Evolução. Tente novamente em alguns minutos ou contate o suporte.']);
    }
  }

  public function destroy(int $id): RedirectResponse
  {
    try {
      $this->evolution->findOrFail($id)->delete();

      return redirect()->back()->with('success', 'Evolução excluída com sucesso!');
    } catch (ModelNotFoundException $e) {
      return redirect()->back()->withErrors(['error' => 'Evolução não encontrada!']);
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Ocorreu um problema na exclusão da Evolução. Tente novamente em alguns minutos ou contate o suporte.']);
    }
  }
}
