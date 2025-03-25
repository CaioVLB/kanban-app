<?php

namespace App\Models;

use App\Traits\BelongsToCompany;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collaborator extends Model
{
  use HasFactory, BelongsToCompany;

  protected $table = 'collaborators';
  protected $fillable = [
    'hire_date', 'birthdate', 'nationality', 'gender', 'marital_status', 'paper_id', 'company_id', 'user_id'
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

  public function evaluations(): HasMany
  {
    return $this->hasMany(Evaluation::class);
  }

  public function getAgeAttribute(): ?int
  {
    if (!$this->birthdate) {
      return null;
    }

    return now()->diffInYears($this->birthdate);
  }

  public function updateMainPhone(int $newPhoneId): void
  {
    $currentMainPhone = $this->phones()->where('main', true)->first();

    if ($currentMainPhone && $currentMainPhone->id !== $newPhoneId) {
      $currentMainPhone->update(['main' => false]);
      $this->phones()->findOrFail($newPhoneId)->update(['main' => true]);
    } elseif (!$currentMainPhone) {
      $this->phones()->findOrFail($newPhoneId)->update(['main' => true]);
    }
  }

  public function updateMainAddress(int $newAddressId): void
  {
    $currentMainAddress = $this->addresses()->where('main', true)->first();

    if ($currentMainAddress && $currentMainAddress->id !== $newAddressId) {
      $currentMainAddress->update(['main' => false]);
      $this->addresses()->findOrFail($newAddressId)->update(['main' => true]);
    } elseif (!$currentMainAddress) {
      $this->addresses()->findOrFail($newAddressId)->update(['main' => true]);
    }
  }

  public function getAllCollaborators(): array|Collection
  {
    return $this->with(['user:id,name'])
    ->select('id', 'user_id')
    ->get();
  }

  /*protected function active(): Attribute
 {
   return Attribute::make(
     get: fn($value, $attributes) => $attributes['active'] ? 'Ativo' : 'Inativo',
     //set: fn($value) => $value === 'Ativo' ? 1 : 0
   );
 }*/

}
