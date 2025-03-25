<?php

namespace App\Models;

use App\Traits\FormatsAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientFile extends Model
{
  use HasFactory, FormatsAttributes;

  protected $table = 'client_files';
  protected $fillable = [
    'content', 'original_name', 'hashed_name', 'path', 'type', 'size', 'client_id', 'by_user_id'
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
