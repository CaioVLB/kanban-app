<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EvaluationRespiratory extends Model
{
  use HasFactory;

  protected $fillable = [
    'evaluation_id', 'family_historic', 'complementary_exams', 'hospitalization'
  ];

  public function evaluation(): BelongsTo
  {
    return $this->belongsTo(Evaluation::class);
  }
}
