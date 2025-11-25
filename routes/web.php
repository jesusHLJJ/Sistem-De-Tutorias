<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AlumnosController;
use App\Http\Controllers\Admin\GruposController;
use App\Http\Controllers\Admin\ProfesoresController;
use App\Http\Controllers\Admin\SalonesController;
use App\Http\Controllers\Alumno\AlumnoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Profesor\CanalizacionController;
use App\Http\Controllers\Profesor\fichaIdenTutoradoController;
use App\Http\Controllers\Profesor\HabilidadesController;
use App\Http\Controllers\Profesor\MaestroController;
use App\Http\Controllers\Profesor\MensualTutoriaController;
use App\Http\Controllers\Profesor\plan_accion_tutoriaController;
use App\Http\Controllers\Profesor\SolicitudAsesoriaController;
use App\Http\Controllers\Profesor\TutoriasacademicasController;
use App\Models\plan_accion_tutoria;
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

        Route::get('/profesores', [ProfesoresController::class, 'show'])->name('profesores.dashboard');
        Route::post('/profesores', [ProfesoresController::class, 'store'])->name('profesores.store');
        Route::get('/profesores/edit/{profesor}', [ProfesoresController::class, 'edit'])->name('profesores.edit');
        Route::put('/profesores/update/{profesor}', [ProfesoresController::class, 'update'])->name('profesores.update');
        Route::delete('/profesores/destroy/{profesor}', [ProfesoresController::class, 'destroy'])->name('profesores.destroy');

        Route::get('/grupos', [GruposController::class, 'show'])->name('grupos.dashboard');
        Route::post('/grupos', [GruposController::class, 'store'])->name('grupos.store');
        Route::get('/grupos/edit/{grupo}', [GruposController::class, 'edit'])->name('grupos.edit');
        Route::put('/grupos/update/{grupo}', [GruposController::class, 'update'])->name('grupos.update');
        Route::delete('/grupos/destroy/{grupo}', [GruposController::class, 'destroy'])->name('grupos.destroy');

        Route::get('/salones', [SalonesController::class, 'index'])->name('salones.dashboard');
        Route::post('/salones', [SalonesController::class, 'store'])->name('salones.store');
        Route::get('/salones/edit/{salon}', [SalonesController::class, 'edit'])->name('salones.edit');
        Route::put('/salones/update/{salon}', [SalonesController::class, 'update'])->name('salones.update');
        Route::delete('/salones/destroy/{salon}', [SalonesController::class, 'destroy'])->name('salones.destroy');

        Route::get('/alumnos', [AlumnosController::class, 'show'])->name('alumnos.dashboard');
        Route::post('/alumnos', [AlumnosController::class, 'store'])->name('alumnos.store');
        Route::get('/alumnos/edit/{alumno}', [AlumnosController::class, 'edit'])->name('alumnos.edit');
        Route::put('/alumnos/{alumno}', [AlumnosController::class, 'update'])->name('alumnos.update');
        Route::delete('/alumnos/{alumno}', [AlumnosController::class, 'destroy'])->name('alumnos.destroy');
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
        Route::get('/alumno/{id_alumno}/habilidades', [HabilidadesController::class, 'verDesdeMaestro'])->name('maestro.maestro.habilidades');
        Route::get('/graficar2/{grupo}', [HabilidadesController::class, 'graficar'])->name('graficar2');

        Route::get('/canalizacion/{id_alumno}', [CanalizacionController::class, 'index'])->name('canalizacion_alumno'); //Formulario Canalizacion
        Route::post('/canalizacion/{id_alumno}', [CanalizacionController::class, 'crear'])->name('canalizacion.crear'); //Crear Canalizacion
        Route::post('/canalizacion/editar/{id_alumno}', [CanalizacionController::class, 'editar_informacion'])->name('canalizacion_editar_info'); //Editar información (Factores que motivan y Observaciones)
        Route::get('/canalizacion/citas/{id_alumno}', [CanalizacionController::class, 'citas'])->name('citas_alumno'); //Ver citas del usuario
        Route::post('/canalizacion/citas/{id_alumno}', [CanalizacionController::class, 'crearcita'])->name('citas_alumno.crear'); //Crear citas
        Route::delete('/canalizacion/citas/eliminar/{id_cita}', [CanalizacionController::class, 'eliminarcita'])->name('citas_alumno.eliminar'); //Eliminar citas
        Route::get('/canalizacion/documentos/{id_alumno}', [CanalizacionController::class, 'verDocumentos'])->name('documentos.ver'); //Ver documentos

        Route::delete('/canalizacion/documentos/eliminar', [CanalizacionController::class, 'eliminarDocumento'])->name('documentos.eliminar');
        Route::get('/canalizacion/documentos/subir/{id_alumno}', [CanalizacionController::class, 'subirDocumentoVista'])->name('documentos.subir');
        Route::post('/canalizacion/documentos/subir', [CanalizacionController::class, 'subirDocumentoGuardar'])->name('documentos.subir.guardar');

        Route::get('/pat/{grupo}', [plan_accion_tutoriaController::class, 'mostrarpat'])->name('pat');
        Route::post('/pat/guardar_info/{grupo}', [plan_accion_tutoriaController::class, 'guardar_info'])->name('pat_guardar');
        Route::post('/pat/modificar_info/{grupo}', [plan_accion_tutoriaController::class, 'modificar_info'])->name('pat_modificar');
        Route::post('/pat/{grupo}/agregar_actividad/{pat}', [plan_accion_tutoriaController::class, 'agregar_actividad'])->name('pat_agregar_actividad');
        Route::post('/pat/borrar_actividad/{actividad}', [plan_accion_tutoriaController::class, 'borrar_actividad'])->name('pat_borrar_actividad');
        Route::post('pat/{pat}/agregar actividad final', [plan_accion_tutoriaController::class, 'agregar_actividad_final'])->name('pat_agregar_act_final');

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


        Route::get(
            '/tutoria-semestral/{id_grupo}',
            [App\Http\Controllers\Profesor\SemestralTutoriaController::class, 'formGrupo']
        )->name('semestral.form');

        Route::post(
            '/tutoria-semestral/guardar',
            [App\Http\Controllers\Profesor\SemestralTutoriaController::class, 'guardar']
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

        Route::post('/solicitud/guardar', [SolicitudAsesoriaController::class, 'guardar'])
            ->name('solicitudasesoria.guardar');


        Route::post('/maestro/tutoria/guardar', [MensualTutoriaController::class, 'guardar'])
            ->name('maestro.tutoria.guardar');
    });
