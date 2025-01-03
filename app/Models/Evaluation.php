<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Evaluation extends Model
{
  use HasFactory;

  protected $fillable = ['client_id', 'type', 'collaborator_id', 'weight', 'height', 'date', 'diagnosis', 'main_complaint', 'history_current_disease', 'history_previous_disease', 'associated_diseases', 'other_diseases', 'family_historic', 'medications', 'complementary_exams', 'inspection_assessment', 'details_affected_local', 'pain_intensity', 'additional_observations'];

  public function client(): BelongsTo
  {
    return $this->belongsTo(Client::class);
  }

  public function collaborator(): BelongsTo
  {
    return $this->belongsTo(Collaborator::class);
  }

  public function characteristics(): HasMany
  {
    return $this->hasMany(EvaluationCharacteristicValue::class);
  }
}
