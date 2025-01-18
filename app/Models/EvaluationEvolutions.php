<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EvaluationEvolutions extends Model
{
  use HasFactory;

  protected $fillable = [
    'evaluation_id ', 'evolution_date', 'observations', 'next_steps'
  ];

  public function evaluation(): BelongsTo
  {
    return $this->belongsTo(Evaluation::class);
  }
}
