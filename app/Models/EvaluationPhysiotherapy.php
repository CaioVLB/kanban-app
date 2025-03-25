<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EvaluationPhysiotherapy extends Model
{
  use HasFactory;

  protected $fillable = [
    'evaluation_id', 'family_historic', 'heart_rate', 'respiratory_rate', 'blood_pressure'
  ];

  public function evaluation(): BelongsTo
  {
    return $this->belongsTo(Evaluation::class);
  }
}
