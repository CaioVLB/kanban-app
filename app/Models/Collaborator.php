<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collaborator extends Model
{
  use HasFactory;

  protected $table = 'collaborators';
  protected $fillable = [
    'hire_date', 'birthdate', 'nationality', 'gender', 'marital_status', 'active', 'paper_id', 'company_id', 'user_id'
  ];

  public function company(): belongsTo
  {
    return $this->belongsTo(Company::class);
  }

  public function paper(): belongsTo
  {
    return $this->belongsTo(Paper::class);
  }

  public function user(): belongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function addresses(): HasMany
  {
    return $this->hasMany(CollaboratorAddress::class);
  }

  public function phones(): HasMany
  {
    return $this->hasMany(CollaboratorPhone::class);
  }

  public function annotations(): HasMany
  {
    return $this->hasMany(CollaboratorAnnotation::class);
  }

  public function files(): HasMany
  {
    return $this->hasMany(CollaboratorFile::class);
  }

  public function assignedToClients(): BelongsToMany
  {
    return $this->belongsToMany(Client::class, 'client_collaborator_assignments')
      ->withTimestamps();
  }
}
