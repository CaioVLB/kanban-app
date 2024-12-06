<?php

namespace App\Models;

use App\Traits\BelongsToCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Board extends Model
{
  use HasFactory, BelongsToCompany;

  protected $table = 'boards';
  protected $fillable = [
    'company_id', 'title', 'description'
  ];

  public function company(): BelongsTo
  {
    return $this->belongsTo(Company::class);
  }

  /*protected static function booted()
  {
    static::addGlobalScope(new CompanyScope);

    static::creating(function ($board) {
      if (session()->has('company_id')) {
        $board->company_id = session()->get('company_id');
      }
    });

    static::updating(function ($board) {
      if (session()->has('company_id')) {
        $board->company_id = session()->get('company_id');
      }
    });
  }*/
}
