<?php

use App\Http\Controllers\PaperController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\CollaboratorController;
use Illuminate\Http\Request;
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
});

/*Route::controller(RoleController::class)->prefix('role')->group(function () {
  Route::post('/', 'store');
  Route::put('/{id}', 'update');
  Route::delete('/{id}', 'destroy');
});

Route::controller(BoardController::class)->prefix('board')->group(function () {
  Route::post('/', 'store');
  Route::put('/{id}', 'update');
  Route::delete('/{id}', 'destroy');
});

Route::controller(CollaboratorController::class)->prefix('collaborator')->group(function () {
  Route::post('/', 'store');
  Route::put('/{id}', 'update');
  Route::delete('/{id}', 'destroy');
});*/
