<?php

use App\Http\Controllers\Client\ClientAddressController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\ClientFileController;
use App\Http\Controllers\Client\ClientPhoneController;
use App\Http\Controllers\Client\EvaluationController;
use App\Http\Controllers\Collaborator\CollaboratorAddressController;
use App\Http\Controllers\Collaborator\CollaboratorController;
use App\Http\Controllers\Collaborator\CollaboratorFileController;
use App\Http\Controllers\Collaborator\CollaboratorPhoneController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImpersonateController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

// use App\Modules\Profile\Controllers\ProfileController;
// use App\Http\Controllers\ProjectController;
// use App\Http\Controllers\TaskController;

Route::get('/', function () {
  return redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  /*Route::get('/board', function () {
    return view('board.board');
  })->name('board');*/

  Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
  Route::prefix('client-dashboard')->group(function () {
    Route::controller(ClientController::class)->group(function () {
      Route::get('/{client_id}', 'show')->name('client.show');
      Route::put('/{client_id}', 'update')->name('client.update');
      Route::post('/{client_id}/notes', 'storeNotes')->name('client.storeNotes');
      Route::delete('/notes/{note_id}', 'destroyNotes')->name('client.destroyNotes');
    });
    Route::controller(ClientPhoneController::class)->prefix('phones')->group(function () {
      Route::post('/{client_id}', 'store')->name('client.phones.store');
      Route::delete('/{phone_id}', 'destroy')->name('client.phones.destroy');
    });
    Route::controller(ClientAddressController::class)->prefix('addresses')->group(function () {
      Route::post('/{client_id}', 'store')->name('client.addresses.store');
      Route::delete('/{address_id}', 'destroy')->name('client.addresses.destroy');
    });
    Route::controller(ClientFileController::class)->prefix('files')->group(function () {
      Route::post('/{client_id}', 'store')->name('client.files.store');
      Route::delete('/{file_id}', 'destroy')->name('client.files.destroy');
      Route::get('/{file_id}/download', 'download')->name('client.files.download');
    });
    Route::controller(EvaluationController::class)->group(function () {
      Route::post('{client_id}/evaluation/{type}', 'evaluations')->name('client.evaluations.evaluation');
      Route::put('{client_id}/evaluation/{evaluation_id}/{type}', 'updateEvaluationName')->name('client.evaluations.updateEvaluationName');
      Route::put('/evaluation/{evaluation_id}/{type}', 'updateEvaluation')->name('client.evaluations.updateEvaluation');
      Route::delete('/evaluation/{evaluation_id}/{type}', 'destroy')->name('client.evaluations.destroy');
    });
  });

  Route::get('/collaborators', [CollaboratorController::class, 'index'])->middleware(['can:access-collaborators'])->name('collaborators.index');
  Route::middleware(['can:access-collaborators'])->prefix('collaborator-dashboard')->group(function () {
    Route::controller(CollaboratorController::class)->group(function () {
      Route::get('/{collaborator_id}', 'show')->name('collaborator.show');
      Route::put('/{collaborator_id}/user/{user_id}', 'update')->name('collaborator.update');
      Route::patch('/{user_id}/reset-pwd', 'resetPassword')->name('collaborator.resetPassword');
      Route::post('/{collaborator_id}/notes', 'storeNotes')->name('collaborator.storeNotes');
      Route::delete('/notes/{note_id}', 'destroyNotes')->name('collaborator.destroyNotes');
    });
    Route::controller(CollaboratorPhoneController::class)->prefix('phones')->group(function () {
      Route::post('/{collaborator_id}', 'store')->name('collaborator.phones.store');
      Route::delete('/{phone_id}', 'destroy')->name('collaborator.phones.destroy');
    });
    Route::controller(CollaboratorAddressController::class)->prefix('addresses')->group(function () {
      Route::post('/{collaborator_id}', 'store')->name('collaborator.addresses.store');
      Route::delete('/{address_id}', 'destroy')->name('collaborator.addresses.destroy');
    });
    Route::controller(CollaboratorFileController::class)->prefix('files')->group(function () {
      Route::post('/{collaborator_id}', 'store')->name('collaborator.files.store');
      Route::delete('/{file_id}', 'destroy')->name('collaborator.files.destroy');
      Route::get('/{file_id}/download', 'download')->name('collaborator.files.download');
    });
  });

  Route::get('/papers', [PaperController::class, 'index'])->middleware(['can:access-collaborators'])->name('papers.index');

  Route::middleware(['can:access-collaborators'])->prefix('categories')->group(function () {
    Route::controller(CategoryController::class)->group(function () {
      Route::get('/', 'index')->name('categories.index');
      Route::post('/', 'store')->name('categories.store');
      Route::put('/{category_id}', 'update')->name('categories.update');
      Route::delete('/{category_id}', 'destroy')->name('categories.destroy');
    });
    Route::controller(ServiceController::class)->prefix('services')->group(function () {
      Route::get('/{category_id}', 'index')->name('services.index');
      Route::post('/{category_id}', 'store')->name('services.store');
      Route::put('/{service_id}', 'update')->name('services.update');
      Route::delete('/{service_id}', 'destroy')->name('services.destroy');
    });
  });

  Route::middleware('can:access-companies')->controller(CompanyController::class)->prefix('companies')->group(function () {
    Route::get('/', 'index')->name('companies.index');
    Route::get('/add', 'create')->name('company.create');
    Route::post('/', 'store')->name('company.store');
    Route::get('/{user_id}/edit', 'edit')->name('company.edit');
    Route::put('/{user_id}', 'update')->name('company.update');
    Route::delete('/{company_id}', 'destroy')->name('company.destroy');
  });

  Route::get('/impersonate/{user_id}/login', [ImpersonateController::class, 'impersonate'])->middleware(['can:impersonate'])->name('impersonate');
  Route::get('/impersonate/leave-impersonating', [ImpersonateController::class, 'leaveImpersonating'])->middleware(['can:leave-impersonating'])->name('leaveImpersonating');
});

require __DIR__.'/auth.php';
