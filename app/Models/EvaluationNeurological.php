<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EvaluationNeurological extends Model
{
  use HasFactory;

  protected $fillable = [
    'evaluation_id ', 'blood_pressure', 'heart_rate', 'physical_assessment', 'inspection_assessment', 'muscle_trophism_characteristic', 'muscle_tone_characteristic'
  ];

  public function evaluation(): BelongsTo
  {
    return $this->belongsTo(Evaluation::class);
  }
}
