<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\AlumneController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Rutas públicas
Route::get('/', function () {
    return view('inici');
})->name('inici');

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['adminAuth'])->group(function () {
        Route::get('/dashboard', function(){
            return view('dashboard');
        })->name('dashboard');

        Route::get('/users', [UserController::class, 'index'])->name('users.llista');
        Route::resource('users', UserController::class)->except(['index']);

        Route::resource('users', UserController::class);
        Route::resource('masters', MasterController::class);
        Route::resource('alumnos', AlumnoController::class);
    });
    
    /* Route::middleware(['consultor'])->group(function () {
        Route::get('/masters', [MasterController::class, 'index'])->name('masters.llista');
        Route::get('/alumnos', [AlumnoController::class, 'index'])->name('alumnos.llista');
    }); */
});

require __DIR__.'/auth.php';