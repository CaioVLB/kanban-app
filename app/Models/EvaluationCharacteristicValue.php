<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EvaluationCharacteristicValue extends Model
{
  use HasFactory;

  protected $fillable = ['evaluation_id', 'characteristic_id', 'value', 'notes'];

  public function evaluation(): BelongsTo
  {
    return $this->belongsTo(Evaluation::class, 'evaluation_id');
  }

  public function characteristic(): BelongsTo
  {
    return $this->belongsTo(EvaluationCharacteristic::class, 'characteristic_id');
  }
}
