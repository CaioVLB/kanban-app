<?php

namespace App;

use App\Models\Scopes\CompanyScope;

trait BelongsToCompany
{
  protected static function bootBelongsToCompany()
  {
    static::addGlobalScope(new CompanyScope);

    static::creating(function ($model) {
      if(session()->has('company_id')) {
        $model->company_id = session()->get('company_id');
      } elseif (request()->has('company_id')) {
        $model->company_id = request()->get('company_id');
      }
    });

    static::updating(function ($model) {
      if(session()->has('company_id')) {
        $model->company_id = session()->get('company_id');
      } elseif (request()->has('company_id')) {
        $model->company_id = request()->get('company_id');
      }
    });
  }
}
