<?php

namespace App\Models;

use App\Traits\BelongsToCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Paper extends Model
{
  use HasFactory, BelongsToCompany;

  protected $table = 'papers';
  protected $fillable = [
    'paper', 'company_id'
  ];

  public function company(): BelongsTo
  {
    return $this->belongsTo(Company::class);
  }

  public function collaborators(): HasMany
  {
    return $this->hasMany(Collaborator::class);
  }

  /*protected static function booted()
  {
    static::addGlobalScope(new CompanyScope);

    static::created(function ($paper) {
      if (session()->has('company_id')) {
        $paper->company_id = session()->get('company_id');
      }
    });

    static::updating(function ($paper) {
      if (session()->has('company_id')) {
        $paper->company_id = session()->get('company_id');
      }
    });
  }*/
}
