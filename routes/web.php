<?php

use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\PhoneController;
use App\Http\Controllers\CollaboratorController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImpersonateController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\ProfileController;
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
  Route::controller(ClientController::class)->prefix('client-dashboard')->group(function () {
    Route::get('/{id}', 'show')->name('client.show');
    Route::post('/{id}/notes', 'storeNotes')->name('client.storeNotes');
    Route::delete('/notes/{note_id}', 'destroyNotes')->name('client.destroyNotes');
  });

  Route::controller(PhoneController::class)->prefix('client-phones')->group(function () {
    Route::post('/{id}', 'store')->name('client-phones.store');
    Route::delete('/{phone_id}', 'destroy')->name('client-phones.destroy');
  });

  Route::get('/collaborators', [CollaboratorController::class, 'index'])->middleware(['can:access-collaborators'])->name('collaborators.index');
  Route::middleware(['can:access-collaborators'])->controller(CollaboratorController::class)->prefix('collaborator-dashboard')->group(function () {
    Route::get('/{id}', 'show')->name('collaborator.show');
    Route::post('/{id}/notes', 'storeNotes')->name('collaborator.storeNotes');
    Route::delete('/notes/{note_id}', 'destroyNotes')->name('collaborator.destroyNotes');
  });

  Route::get('/papers', [PaperController::class, 'index'])->middleware(['can:access-collaborators'])->name('papers.index');

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
