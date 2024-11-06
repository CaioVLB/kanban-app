<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
  use HasFactory;

  protected $table = 'collaborators';
  protected $fillable = [
    'name',
    'email',
    'phone_number',
    'role_id',
  ];

  public function role()
  {
    return $this->belongsTo(Role::class);
  }
}
