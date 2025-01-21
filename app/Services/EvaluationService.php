<?php

namespace App\Services;

use App\Enums\ProfileEnum;
use App\Models\Client;
use App\Models\Collaborator;
use App\Models\Evaluation;
use App\Models\EvaluationNeurological;
use App\Models\EvaluationOrthopedic;
use App\Models\EvaluationPhysiotherapy;
use App\Models\EvaluationRespiratory;
use Illuminate\Support\Facades\DB;

class EvaluationService
{

  private const VALID_TYPES = [
    'physiotherapy' => 'evaluations.physiotherapy',
    'neurological' => 'evaluations.neurological',
    'respiratory' => 'evaluations.respiratory',
    'orthopedic' => 'evaluations.orthopedic',
  ];

  public function __construct(
    protected Client $client,
    protected Collaborator $collaborator,
    protected Evaluation $evaluation,
    protected EvaluationPhysiotherapy $physiotherapy,
    protected EvaluationNeurological $neurological,
    protected EvaluationRespiratory $respiratory,
    protected EvaluationOrthopedic $orthopedic,
  ){}

  public function storeEvaluation(array $data, string $type): Evaluation
  {
    return DB::transaction(function () use ($data, $type) {
      $evaluation = $this->evaluation->create($data);

      $this->createSpecificEvaluation($evaluation, $type);

      return $evaluation;
    });
  }

  protected function createSpecificEvaluation(Evaluation $evaluation, string $type): void
  {
    $relationshipMap = [
      'physiotherapy' => 'physiotherapy',
      'neurological' => 'neurological',
      'respiratory' => 'respiratory',
      'orthopedic' => 'orthopedic',
    ];

    $evaluation->{$relationshipMap[$type]}()->create();
  }

  public function validateEvaluationType(string $type): bool
  {
    return array_key_exists($type, self::VALID_TYPES);
  }

  public function getViewName(string $type): ?string
  {
    return self::VALID_TYPES[$type] ?? null;
  }


  public function validateClient(int $client_id): ?Client
  {
    return $this->client->basicCustomerData($client_id);
  }

  public function getAuthenticatedCollaborator(): ?int
  {
    $collaborator = $this->collaborator->where('user_id', auth()->user()->id)->first();
    return $collaborator ? $collaborator->id : null;
  }

  public function authorizeActionEvaluation(Evaluation $evaluation)
  { // Verifica se o usuário é um ADMIN/GESTOR ou se é o colaborador da avaliação (caso a avaliação tenha colaborador vinculado).
    return auth()->user()->profile_id === ProfileEnum::ADMIN || auth()->user()->profile_id === ProfileEnum::MANAGER ||
      ($evaluation->collaborator && auth()->user()->id === $evaluation->collaborator->user_id);
  }
}
