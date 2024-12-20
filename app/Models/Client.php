<?php

namespace App\Models;

use App\Traits\BelongsToCompany;
use App\Traits\FormatsAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
  use HasFactory, BelongsToCompany, FormatsAttributes;

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

  public function assignedToCollaborators(): BelongsToMany
  {
    return $this->belongsToMany(Collaborator::class, 'client_collaborator_assignments')
      ->withTimestamps();
  }

  /*protected static function booted()
  {
    static::addGlobalScope(new CompanyScope);

    static::creating(function ($client) {
      if(session()->has('company_id')) {
        $client->company_id = session()->get('company_id');
      }
    });

    static::updating(function ($client) {
      if(session()->has('company_id')) {
        $client->company_id = session()->get('company_id');
      }
    });
  }*/

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

}
