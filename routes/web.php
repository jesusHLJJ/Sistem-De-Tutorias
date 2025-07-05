<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CanalizacionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaestroController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TutoriasacademicasController;
use App\Http\Controllers\fichaIdenTutoradoController;
use App\Http\Controllers\HabilidadesController;
use App\Http\Controllers\MensualTutoriaController;
use App\Http\Controllers\SolicitudAsesoriaController;
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
        Route::get('/graficar/{grupo}', 'graficar')->name('graficar');

        Route::get('/tutorias-academicas', [TutoriasacademicasController::class, 'index'])->name('tutorias_academicas');
        Route::post('/tutorias-academicas/guardar', [TutoriasacademicasController::class, 'guardar'])->name('guardar_tutorias_academicas');
        Route::get('/alumno/{id_alumno}/seleccionar', [MaestroController::class, 'seleccionarVistaAlumno'])->name('alumno.seleccionar');
        Route::get('/alumno/{id_alumno}/habilidades', [App\Http\Controllers\HabilidadesController::class, 'verDesdeMaestro'])->name('maestro.maestro.habilidades');
        Route::get('/graficar2/{grupo}', [App\Http\Controllers\HabilidadesController::class, 'graficar'])->name('graficar2');

        Route::get('/canalizacion/{id_alumno}', [CanalizacionController::class, 'index'])->name('canalizacion_alumno'); //Formulario Canalizacion
        Route::post('/canalizacion/{id_alumno}', [CanalizacionController::class, 'crear'])->name('canalizacion.crear'); //Crear Canalizacion
        Route::get('/canalizacion/citas/{id_alumno}', [CanalizacionController::class, 'citas'])->name('citas_alumno'); //Ver citas del usuario
        Route::post('/canalizacion/citas/{id_alumno}', [CanalizacionController::class, 'crearcita'])->name('citas_alumno.crear'); //Crear citas
        Route::delete('/canalizacion/citas/eliminar/{id_cita}', [CanalizacionController::class, 'eliminarcita'])->name('citas_alumno.eliminar'); //Eliminar citas
        Route::get('/canalizacion/documentos/{id_alumno}', [CanalizacionController::class, 'verDocumentos'])->name('documentos.ver'); //Ver documentos

        Route::delete('/canalizacion/documentos/eliminar', [CanalizacionController::class, 'eliminarDocumento'])->name('documentos.eliminar');
        Route::get('/canalizacion/documentos/subir/{id_alumno}', [CanalizacionController::class, 'subirDocumentoVista'])->name('documentos.subir');
        Route::post('/canalizacion/documentos/subir', [CanalizacionController::class, 'subirDocumentoGuardar'])->name('documentos.subir.guardar');



        Route::get('/maestro/solicitudes/{id}', [SolicitudAsesoriaController::class, 'listaSolicitudes2'])
            ->name('maestro.solicitudes.lista');

        // Ruta para ver una solicitud de asesoría por el maestro
        Route::get('/maestro/solicitud/{id}', [SolicitudAsesoriaController::class, 'ver2'])
            ->name('maestro.solicitud.ver');

        Route::get('/reporte-asesorias', [MaestroController::class, 'reporteAsesorias'])
            ->name('maestro.reporte.asesorias');

        Route::get('/maestro/reporte-tutoria', [MaestroController::class, 'reporteMensualTutoria'])
        ->name('maestro.reporte.tutoria');


         Route::get('/maestro/tutoria', [MensualTutoriaController::class, 'index'])
         ->name('maestro.tutoria.index'); // formulario
        Route::get('/maestro/tutoria/reporte', [MensualTutoriaController::class, 'reporte'])
        ->name('maestro.tutoria.reporte'); // vista tipo reporte
        Route::put('maestro/tutoria/actualizar/{id}', [MensualTutoriaController::class, 'actualizar'])
        ->name('maestro.tutoria.actualizar');

        Route::get('/maestro/tutoria/registro', [MensualTutoriaController::class, 'vistaRegistro'])
        ->name('maestro.tutoria.registro');
        Route::post('/maestro/tutoria/guardar', [MensualTutoriaController::class, 'guardar'])
        ->name('maestro.tutoria.guardar');


        Route::get('/tutoria-semestral/{id_grupo}', 
            [App\Http\Controllers\SemestralTutoriaController::class, 'formGrupo']
        )->name('semestral.form');

        Route::post('/tutoria-semestral/guardar', 
            [App\Http\Controllers\SemestralTutoriaController::class, 'guardar']
        )->name('semestral.guardar');
    });

Route::prefix('alumno')
    ->middleware(['auth', 'role:3'])
    ->name('alumno.')
    ->controller(AlumnoController::class)
    ->group(function () {
        Route::get('/', 'show')->name('dashboard');
        Route::get('/ficha-identificacion', [fichaIdenTutoradoController::class, 'index'])->name('fichaidentificacion');
        Route::post('/identificacion/guardar', [fichaIdenTutoradoController::class, 'guardar'])->name('ficha.guardar');

        Route::get('/encuesta_habilidades', [HabilidadesController::class, 'index'])->name('habilidades');
        Route::post('/habilidades/guardar', [HabilidadesController::class, 'guardar'])->name('habilidad.guardar');
        Route::post('/habilidades/guardar2', [HabilidadesController::class, 'guardar2'])->name('habilidad.guardar2');
        Route::post('/habilidades/guardar3', [HabilidadesController::class, 'guardar3'])->name('habilidad.guardar3');

        Route::get('/solicitud/nueva', [SolicitudAsesoriaController::class, 'index'])
            ->name('solicitudasesoria.formulario');

        // Ruta para ver una solicitud en específico
        Route::get('/solicitud/{id}', [SolicitudAsesoriaController::class, 'ver'])
            ->name('solicitudasesoria.ver');

        // Ruta para la lista de solicitudes de asesoría
        Route::get('/solicitudes', [SolicitudAsesoriaController::class, 'listaSolicitudes'])
            ->name('solicitudes.lista');

            Route::post('/maestro/tutoria/guardar', [MensualTutoriaController::class, 'guardar'])
    ->name('maestro.tutoria.guardar');
    });
