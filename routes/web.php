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

require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function () {

    Route::middleware(['adminAuth'])->group(function () {
        Route::get('/dashboard', function(){
            return view('dashboard');
        })->name('dashboard');
    /* Route::get('/users', [UserController::class, 'index'])->name('users.llista');
        Route::resource('users', UserController::class)->except(['index']); */

        Route::resource('users', UserController::class);
        Route::resource('masters', MasterController::class);
        Route::resource('alumnes', AlumneController::class);
    });

    Route::middleware(['consultorAuth'])->group(function () {
        Route::get('/dashboard-consultor', function(){
            return view('dashboard-consultor');
        })->name('dashboard-consultor');
    });

    Route::resource('masters', MasterController::class);
    Route::resource('alumnes', AlumneController::class);
});

