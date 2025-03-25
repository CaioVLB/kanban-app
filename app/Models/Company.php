<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = [
      'name', 'cnpj', 'corporate_name', 'hire_date', 'active'
    ];

  public function users() : HasMany
  {
    return $this->hasMany(User::class);
  }

  public function collaborators(): HasMany
  {
    return $this->hasMany(Collaborator::class);
  }

  public function clients(): HasMany
  {
    return $this->hasMany(Client::class);
  }

  public function boards(): HasMany
  {
    return $this->hasMany(Board::class);
  }

  public function papers(): HasMany
  {
    return $this->hasMany(Paper::class);
  }

  public function categories(): HasMany
  {
    return $this->hasMany(Category::class);
  }

  public function setCnpjAttribute($value)
  {
    $this->attributes['cnpj'] = preg_replace('/\W/', '', $value);
  }

  public function getCnpjAttribute($value)
  {
    return preg_replace(
      '/([A-Z0-9]{2})([A-Z0-9]{3})([A-Z0-9]{3})([A-Z0-9]{4})([0-9]{2})/',
      '$1.$2.$3/$4-$5',
      $value
    );
  }

  /*protected static function booted()
  {
    static::deleting(function ($company) {
      // Excluir usuários relacionados
      $company->users()->delete();

      // Excluir colaboradores relacionados
      $company->collaborators()->delete();

      // Excluir clientes relacionados
      $company->clients()->delete();

      // Excluir boards relacionados
      $company->boards()->delete();

      // Excluir papers relacionados
      $company->papers()->delete();
    });
  }*/
}
