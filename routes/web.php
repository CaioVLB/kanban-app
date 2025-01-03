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
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

// use App\Modules\Profile\Controllers\ProfileController;
// use App\Http\Controllers\ProjectController;
// use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::get('/collaborator-dashboard', function () {
    return view('collaborator.collaborator-dashboard');
  })->name('collaborator-dashboard');
  Route::get('/board', function () {
    return view('board.board');
  })->name('board');

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
    Route::controller(EvaluationController::class)->prefix('evaluations')->group(function () {
      Route::get('/physiotherapy/{client_id}', 'physiotherapy')->name('client.evaluations.physiotherapy');
      Route::post('/{client_id}', 'store')->name('client.evaluations.store');
    });
  });

  Route::get('/collaborators', [CollaboratorController::class, 'index'])->middleware(['can:access-collaborators'])->name('collaborators.index');
  Route::middleware(['can:access-collaborators'])->prefix('collaborator-dashboard')->group(function () {
    Route::controller(CollaboratorController::class)->group(function () {
      Route::get('/{collaborator_id}', 'show')->name('collaborator.show');
      Route::put('/{collaborator_id}/user/{user_id}', 'update')->name('collaborator.update');
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

  Route::get('/services', [ServiceController::class, 'index'])->middleware(['can:access-collaborators'])->name('services.index');

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
