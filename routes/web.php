<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
    Route::get('/team', function () {
        return view('team.team');
    })->name('team');
    Route::get('/board', function () {
        return view('board.board');
    })->name('board');
});

require __DIR__.'/auth.php';
