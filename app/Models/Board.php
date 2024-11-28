<?php

namespace App\Models;

use App\Models\Scopes\CompanyScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ScopedBy([CompanyScope::class])]
class Board extends Model
{
  use HasFactory;

  protected $table = 'boards';
  protected $fillable = [
    'company_id', 'title', 'description'
  ];

  public function company(): BelongsTo
  {
    return $this->belongsTo(Company::class);
  }
}
