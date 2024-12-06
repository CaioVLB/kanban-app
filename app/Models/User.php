<?php

namespace App\Models;

use App\Enums\ProfileEnum;
use App\Traits\FormatsAttributes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable //implements MustVerifyEmail
{
  use HasApiTokens, HasFactory, Notifiable, FormatsAttributes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'cpf',
    'email',
    'password',
    'company_id',
    'profile_id',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'profile_id' => ProfileEnum::class
  ];

  public function company(): BelongsTo
  {
    return $this->belongsTo(Company::class);
  }

  public function profile(): BelongsTo
  {
    return $this->belongsTo(Profile::class);
  }

  public function collaborators(): HasMany
  {
    return $this->hasMany(Collaborator::class);
  }

  public function notesCreatedForCollaborator(): HasMany
  {
    return $this->hasMany(CollaboratorAnnotation::class);
  }

  public function uploadedFilesForCollaborator(): HasMany
  {
    return $this->hasMany(CollaboratorFile::class);
  }

  public function notesCreatedForClient(): HasMany
  {
    return $this->hasMany(ClientAnnotation::class);
  }

  public function uploadedFilesForClient(): HasMany
  {
    return $this->hasMany(ClientFile::class);
  }
}
