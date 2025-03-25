<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function states(): HasMany
  {
    return $this->hasMany(State::class);
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
