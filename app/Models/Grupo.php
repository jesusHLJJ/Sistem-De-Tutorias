<?php

// app/Models/Grupo.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Semestres;
use App\Models\Profesor;

class Grupo extends Model
{
    use HasFactory;

    protected $table = 'grupos';

    protected $primaryKey = 'id_grupo';

    protected $fillable = [
        'id_carrera',
        'id_semestre',
        'id_turno',
        'clave_grupo',
        'id_profesor',
        'id_periodo',
        'id_salon'
    ];

    // Relaciones
    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'id_carrera');
    }

    public function semestre()
    {
        return $this->belongsTo(Semestres::class, 'id_semestre');
    }
    // Relación con el modelo Profesor
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'id_profesor', 'id_profesor');
    }

    public function alumnos()
    {
        // Asegúrate de que la relación está usando la clave correcta
        return $this->hasMany(Alumno::class, 'id_grupo', 'id_grupo');
    }

    public function periodo()
    {
        return $this->belongsTo(Periodos::class, 'id_periodo', 'id_periodo');
    }
    public function turno()
    {
        return $this->belongsTo(Turno::class, 'id_turno');
    }
    public function salon()
    {
        return $this->belongsTo(Salon::class, 'id_salon');
    }

    public function materias()
    {
        return $this->belongsToMany(Materias::class, 'grupo_materia', 'id_grupo', 'id_materia');
    }
}