<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SemestralTutoria extends Model
{
    protected $table = 'semestral_tutoria';
    protected $primaryKey = 'id_tutoria_academica';
    public $timestamps = true;

    protected $fillable = [
        'id_profesor',
        'id_alumno',
        'tutoria_grupal',
        'tutoria_individual',
        'asesoria_academica',
        'area_psicologica',
        'crditos_culturales_deportivos',
        'crditos_academicos',
        'ingles_cubierto',
        'materias_reprobadas',
        'informe_grupal',
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'id_alumno', 'id_alumno');
    }

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'id_profesor', 'id_profesor');
    }
}
