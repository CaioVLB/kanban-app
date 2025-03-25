<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EvaluationEvolutions extends Model
{
  use HasFactory;

  protected $fillable = [
    'evaluation_id', 'evolution_date', 'observations', 'next_steps'
  ];

  public function evaluation(): BelongsTo
  {
    return $this->belongsTo(Evaluation::class);
  }

  protected function getDateForPreviewAttribute(): ?string
  {
    return $this->attributes['evolution_date']
      ? Carbon::parse($this->attributes['evolution_date'])->format('d/m/Y')
      : null;
  }
}
