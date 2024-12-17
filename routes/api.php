<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\AddressController;
use App\Http\Controllers\Client\PhoneController;
use App\Http\Controllers\CollaboratorController;
use App\Http\Controllers\PaperController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    //return $request->user();
//});

Route::middleware('auth:sanctum')->group(function () {
  Route::apiResource('papers', PaperController::class)->only(['store', 'update', 'destroy']);
  Route::apiResource('boards', BoardController::class)->only(['store', 'update', 'destroy']);
  Route::apiResource('collaborators', CollaboratorController::class)->only(['store', 'update', 'destroy']);
  Route::apiResource('clients', ClientController::class)->only(['store', 'update', 'destroy']);
  Route::apiResource('client-addresses', AddressController::class)->only(['store', 'destroy']);
  //Route::apiResource('client-phones', PhoneController::class)->only(['store', 'destroy']);
});
