<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\ClientFileController;
use App\Http\Controllers\Collaborator\CollaboratorController;
use App\Http\Controllers\Collaborator\CollaboratorFileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
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

Route::middleware('auth:sanctum')->group(function () {
  Route::apiResource('papers', PaperController::class)->only(['store', 'update', 'destroy']);
  Route::apiResource('boards', BoardController::class)->only(['store', 'update', 'destroy']);
  Route::apiResource('collaborators', CollaboratorController::class)->only(['store', 'update', 'destroy']);
  Route::apiResource('clients', ClientController::class)->only(['store']);

  Route::get('/states/{id}/cities', [CityController::class, 'getCities']);
  Route::get('client/files/{file_id}/view', [ClientFileController::class, 'view'])->name('client.files.view');
  Route::get('collaborator/files/{file_id}/view', [CollaboratorFileController::class, 'view'])->name('collaborator.files.view');

  Route::put('/collaborator/{user_id}/is_active', [CollaboratorController::class, 'modifyStatus']);
  Route::put('/category/{category_id}/is_active', [CategoryController::class, 'modifyStatus']);
  Route::put('/service/{service_id}/is_active', [ServiceController::class, 'modifyStatus']);
});
