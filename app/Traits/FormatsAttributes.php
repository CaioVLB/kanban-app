<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait FormatsAttributes
{
  /**
   * Remove a máscara de CPF.
   */
  protected function cpf(): Attribute
  {
    return Attribute::make(
      get: fn($value) => $value
        ? preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $value)
        : null,
      set: fn($value) => preg_replace('/\D/', '', $value)
    );
  }

  /**
   * Remove a máscara de telefone.
   */
  protected function phoneNumber(): Attribute
  {
    return Attribute::make(
      get: fn($value) => $value
        ? preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $value)
        : null,
      set: fn($value) => preg_replace('/\D/', '', $value)
    );
  }

  protected function createdAt(): Attribute
  {
    return Attribute::make(
      get: fn($value) => $value
        ? Carbon::parse($value)->setTimezone(config('app.timezone'))->format('d/m/Y') . ' às ' . Carbon::parse($value)->setTimezone(config('app.timezone'))->format('H:i')
        : null
    );
  }
}
