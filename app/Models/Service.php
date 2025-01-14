<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'price', 'is_active', 'category_id'];

  public function category(): BelongsTo
  {
    return $this->belongsTo(Category::class);
  }

  /**
   * Mutator para formatar o preço antes de salvar no banco.
   */
  public function setPriceAttribute($value)
  {
    // Remove caracteres não numéricos (exceto vírgula e ponto)
    $numericValue = str_replace(['R$', '.', ','], ['', '', '.'], $value);

    // Converte para formato numérico (decimal)
    $this->attributes['price'] = (float) $numericValue;
  }

  /**
   * Accessor para formatar o preço para exibição.
   */
  public function getPriceAttribute($value)
  {
    return 'R$ ' . number_format($value, 2, ',', '.');
  }
}
