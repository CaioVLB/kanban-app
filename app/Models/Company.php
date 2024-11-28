<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = [
      'name', 'hire_date', 'active'
    ];

  public function users() : HasMany
  {
    return $this->hasMany(User::class);
  }

  public function collaborators(): HasMany
  {
    return $this->hasMany(Collaborator::class);
  }

  public function clients(): HasMany
  {
    return $this->hasMany(Client::class);
  }

  public function boards(): HasMany
  {
    return $this->hasMany(Board::class);
  }

  public function papers(): HasMany
  {
    return $this->hasMany(Paper::class);
  }
}
