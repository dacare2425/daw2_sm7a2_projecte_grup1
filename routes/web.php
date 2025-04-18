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

Route::get('/info', function () {
    return view('info');
})->name('info');

Route::get('/login', function () {
    return view('login');
})->name('login');

// Rutas de autenticación básica
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard según rol
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'Administrador') {
            return view('dashboard');
        } else {
            return view('dashboard-consultor');
        }
    })->name('dashboard');

    // Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas para Consultores
Route::middleware(['auth', 'verified', 'role:Consultor'])->group(function () {
    Route::get('masters/index', [MasterController::class, 'index'])->name('masters.index');
    Route::get('alumnes/index', [AlumneController::class, 'index'])->name('alumnes.index');
});

// Rutas para Administradores
Route::middleware(['auth', 'verified', 'role:Administrador'])->group(function () {
    // Gestión completa de Masters
    Route::resource('masters', MasterController::class);
    
    // Gestión completa de Alumnes
    Route::resource('alumnes', AlumneController::class);
    
    // Gestión completa de Usuarios
    Route::resource('users', UserController::class);
    
    // Dashboard de administración
    Route::get('/admin-dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

require __DIR__.'/auth.php';