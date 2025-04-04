<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function country(): BelongsTo
  {
    return $this->belongsTo(Country::class);
  }

  public function cities(): HasMany
  {
    return $this->hasMany(City::class);
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
