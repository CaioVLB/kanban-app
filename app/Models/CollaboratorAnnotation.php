<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CollaboratorAnnotation extends Model
{
  use HasFactory;

  protected $table = 'collaborator_annotations';
  protected $fillable = [
    'content', 'collaborator_id', 'by_user_id'
  ];

  public function collaborator(): BelongsTo
  {
    return $this->belongsTo(Collaborator::class);
  }

  public function createdBy(): BelongsTo
  {
    return $this->belongsTo(User::class, 'by_user_id');
  }
}
