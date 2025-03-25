<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Evaluation extends Model
{
  use HasFactory;

  protected $fillable = [
    'evaluation_name', 'client_id', 'type', 'collaborator_id', 'weight', 'height', 'date', 'diagnosis', 'main_complaint', 'history_current_disease', 'history_previous_disease', 'associated_diseases', 'physical_activity', 'details_physical_activity', 'habits_vices', 'medications', 'additional_observations'
  ];

  public function client(): BelongsTo
  {
    return $this->belongsTo(Client::class);
  }

  public function collaborator(): BelongsTo
  {
    return $this->belongsTo(Collaborator::class);
  }

  public function physiotherapy(): HasOne
  {
    return $this->hasOne(EvaluationPhysiotherapy::class);
  }

  public function neurological(): HasOne
  {
    return $this->hasOne(EvaluationNeurological::class);
  }

  public function respiratory(): HasOne
  {
    return $this->hasOne(EvaluationRespiratory::class);
  }

  public function orthopedic(): HasOne
  {
    return $this->hasOne(EvaluationOrthopedic::class);
  }

  public function evolutions(): HasMany
  {
    return $this->hasMany(EvaluationEvolutions::class);
  }

  protected function date(): Attribute
  {
    return Attribute::make(
      get: fn($value) => $value
        ? Carbon::parse($value)
          ->timezone(config('app.timezone'))
          ->format('d/m/Y')
        : null
    );
  }

  public function getDateForInput(): ?string
  {
    return $this->attributes['date']
      ? Carbon::parse($this->attributes['date'])->format('Y-m-d')
      : null;
  }

  public function findEvaluationWithRelation(int $id, string $type): Evaluation
  {
    return $this->with([
      'collaborator:id,user_id',
      'collaborator.user:id,name',
      $type
    ])->findOrFail($id);
  }

  public function findEvaluationValidation(int $id, string $type): Evaluation
  {
    return $this->with(['collaborator:id,user_id'])
      ->select('id', 'collaborator_id')
      ->where('type', $type)
      ->findOrFail($id);
  }

}
