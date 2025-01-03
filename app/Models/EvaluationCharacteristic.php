<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EvaluationCharacteristic extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'type'];

  public function values(): HasMany
  {
    return $this->hasMany(EvaluationCharacteristicValue::class, 'characteristic_id');
  }
}
