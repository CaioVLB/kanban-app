<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
// use App\Modules\Profile\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/client', function () {
        return view('client.client');
    })->name('client');
    Route::get('/client-dashboard', function () {
        return view('client.client-dashboard');
    })->name('client-dashboard');
    Route::get('/collaborator', function () {
        return view('collaborator.collaborator');
    })->name('collaborator');
    Route::get('/collaborator-dashboard', function () {
      return view('collaborator.collaborator-dashboard');
    })->name('collaborator-dashboard');
    Route::get('/board', function () {
        return view('board.board');
    })->name('board');

    Route::get('/role', [RoleController::class, 'index'])->name('role.index');
});

require __DIR__.'/auth.php';
