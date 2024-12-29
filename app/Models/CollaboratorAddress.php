<?php

namespace App\Models;

use App\Traits\FormatsAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CollaboratorAddress extends Model
{
  use HasFactory, FormatsAttributes;
  protected $table = 'collaborator_addresses';
  protected $fillable = [
    'collaborator_id', 'main', 'description', 'zipcode', 'street', 'number', 'neighborhood', 'city_id', 'state_id', 'country_id'
  ];

  public function collaborator(): belongsTo
  {
    return $this->belongsTo(Collaborator::class);
  }

  public function country(): BelongsTo
  {
    return $this->belongsTo(Country::class);
  }

  public function state(): BelongsTo
  {
    return $this->belongsTo(State::class);
  }

  public function city(): BelongsTo
  {
    return $this->belongsTo(City::class);
  }
}
