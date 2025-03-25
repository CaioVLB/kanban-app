<?php

namespace App\Models;

use App\Traits\FormatsAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientPhone extends Model
{
  use HasFactory, FormatsAttributes;

  protected $table = 'client_phones';
  protected $fillable = [
    'client_id', 'main', 'identifier', 'phone_number'
  ];

  public function client(): BelongsTo
  {
    return $this->belongsTo(Client::class);
  }
}
