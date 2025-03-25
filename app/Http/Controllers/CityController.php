<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\JsonResponse;

class CityController extends Controller
{
  public function getCities(int $id): JsonResponse
  {
    $cities = City::where('state_id', $id)->orderBy('city', 'asc')->select(['id', 'city'])->get();

    return response()->json($cities);
  }
}
