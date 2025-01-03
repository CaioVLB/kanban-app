<?php

namespace App\Services;

use App\Models\Evaluation;
use App\Models\EvaluationCharacteristicValue;
use Illuminate\Support\Facades\DB;

class EvaluationService
{

  public function __construct(
    protected Evaluation $evaluation,
    protected EvaluationCharacteristicValue $ecv,
  ){}

  public function store()
  {
    dd($this->evaluation);
  }
}
