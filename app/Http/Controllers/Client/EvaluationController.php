<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\EvaluationCharacteristic;
use App\Services\EvaluationService;
use Illuminate\View\View;

class EvaluationController extends Controller
{
  public function __construct(
    protected EvaluationService $evaluationService,
    protected EvaluationCharacteristic $ec,
  ){}

  public function physiotherapy(): View
  {
    dd($this->ec->all());

    return view('client.form.client-categories.evaluations.physiotherapy-form');
    //$this->evaluationService->store();
  }
}
