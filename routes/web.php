<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaestroController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\fichaIdenTutoradoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::prefix('admin')
    ->middleware(['auth', 'role:1'])
    ->name('admin.')
    ->controller(AdminController::class)
    ->group(function () {
        Route::get('/', 'show')->name('dashboard');
        Route::get('/registro', 'registro')->name('registros');
        // Gestión de maestros
        Route::post('/registro', 'storeMaestro')->name('maestros.store');
        Route::put('/maestros/{maestro}', 'updateMaestro')->name('maestros.update');
        Route::delete('/maestros/{maestro}', 'destroyMaestro')->name('maestros.destroy');
    });

    Route::prefix('maestro')
    ->middleware(['auth', 'role:2'])
    ->name('maestro.')
    ->controller(MaestroController::class)
    ->group(function () {
        Route::get('/', 'show')->name('dashboard');
        Route::get('/grupos', 'grupos')->name('grupos');
        Route::get('/grupo/{grupo}', 'mostrarGrupo')->name('grupo.show');
        
        // Ruta para la ficha del alumno, con el nombre 'maestro.ficha_id_profesor'
        Route::get('/ficha/{id_alumno}', [MaestroController::class, 'ficha'])->name('maestro.ficha_id_profesor');
        Route::get('/graficar', 'graficar')->name('graficar');
    });


    Route::prefix('alumno')
    ->middleware(['auth', 'role:3'])
    ->name('alumno.')
    ->controller(AlumnoController::class)
    ->group(function () {
        Route::get('/', 'show')->name('dashboard');
        Route::get('/ficha-identificacion', [fichaIdenTutoradoController::class, 'index'])->name('fichaidentificacion');
        Route::post('/identificacion/guardar', [fichaIdenTutoradoController::class, 'guardar'])->name('ficha.guardar');
    });
