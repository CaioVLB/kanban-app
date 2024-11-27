<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Paper extends Model
{
    use HasFactory;

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
}
