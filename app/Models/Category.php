<?php

namespace App\Models;

use App\Traits\BelongsToCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
  use HasFactory, BelongsToCompany;

  protected $fillable = ['name', 'is_active', 'company_id'];

  public function company(): BelongsTo
  {
    return $this->belongsTo(Company::class);
  }

  public function services(): HasMany
  {
    return $this->hasMany(Service::class);
  }
}
