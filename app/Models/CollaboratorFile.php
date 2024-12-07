<?php

namespace App\Models;

use App\Traits\FormatsAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CollaboratorFile extends Model
{
  use HasFactory, FormatsAttributes;

  protected $table = 'collaborator_files';
  protected $fillable = [
    'content', 'path', 'extension', 'collaborator_id', 'by_user_id'
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
