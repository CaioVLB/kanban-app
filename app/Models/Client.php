<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
  use HasFactory;

  protected $table = 'clients';
  protected $fillable = [
    'name', 'cpf', 'email', 'birthdate', 'gender', 'nationality', 'marital_status', 'weight', 'occupation', 'company_id'
  ];

  public function company(): BelongsTo
  {
    return $this->belongsTo(Company::class);
  }

  public function addresses(): HasMany
  {
    return $this->hasMany(ClientAddress::class);
  }

  public function phones(): HasMany
  {
    return $this->hasMany(ClientPhone::class);
  }

  public function annotations(): HasMany
  {
    return $this->hasMany(ClientAnnotation::class);
  }

  public function files(): HasMany
  {
    return $this->hasMany(ClientFile::class);
  }
}
