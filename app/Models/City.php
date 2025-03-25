<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function state(): BelongsTo
  {
    return $this->belongsTo(State::class);
  }

  public function clientAddresses(): HasMany
  {
    return $this->hasMany(ClientAddress::class);
  }

  public function collaboratorAddresses(): HasMany
  {
    return $this->hasMany(CollaboratorAddress::class);
  }
}
