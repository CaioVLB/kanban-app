<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CollaboratorPhone extends Model
{
  use HasFactory;

  protected $table = 'collaborator_phones';
  protected $fillable = [
    'collaborator_id', 'main', 'identifier', 'phone_number'
  ];

  public function collaborator(): BelongsTo
  {
    return $this->belongsTo(Collaborator::class);
  }
}
