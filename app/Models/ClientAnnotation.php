<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientAnnotation extends Model
{
  use HasFactory;

  protected $table = 'client_annotations';
  protected $fillable = [
    'content', 'client_id', 'by_user_id'
  ];

  public function client(): BelongsTo
  {
    return $this->belongsTo(Client::class);
  }

  public function createdBy(): BelongsTo
  {
    return $this->belongsTo(User::class, 'by_user_id');
  }
}
