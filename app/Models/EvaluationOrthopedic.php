<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EvaluationOrthopedic extends Model
{
  use HasFactory;

  protected $fillable = [
    'evaluation_id', 'pain_intensity', 'details_affected_local', 'complementary_exams'
  ];

  public function evaluation(): BelongsTo
  {
    return $this->belongsTo(Evaluation::class);
  }
}
