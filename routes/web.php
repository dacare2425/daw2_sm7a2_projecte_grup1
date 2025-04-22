<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\AlumneController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inici');
})->name('inici');

Route::get('/info', function () {
    return view('info');
})->name('info');

require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function () {

    Route::middleware(['adminAuth'])->group(function () {
        Route::get('/dashboard', function(){
            return view('dashboard');
        })->name('dashboard');

        Route::resource('users', UserController::class);
        Route::resource('masters', MasterController::class);
        Route::resource('alumnes', AlumneController::class);
    });

    Route::middleware(['consultorAuth'])->group(function () {
        Route::get('/dashboard-consultor', function(){
            return view('dashboard-consultor');
        })->name('dashboard-consultor');
    });

    Route::get('masters', [MasterController::class, 'index'])->name('masters.index');
    Route::get('masters/{master}', [MasterController::class, 'show'])->name('masters.show');
    Route::get('/masters/{master}/pdf', [MasterController::class, 'exportPdf'])->name('masters.exportPdf');
    
    Route::get('alumnes', [AlumneController::class, 'index'])->name('alumnes.index');
    Route::get('alumnes/{alumne}', [AlumneController::class, 'show'])->name('alumnes.show');
    Route::get('/alumnes/{alumne}/pdf', [AlumneController::class, 'exportPdf'])->name('alumnes.exportPdf');
});

