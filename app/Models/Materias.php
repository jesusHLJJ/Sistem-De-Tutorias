<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materias extends Model
{
    use HasFactory;

    protected $table = 'materias';
    protected $primaryKey = 'id_materia';

    // Campos que se pueden llenar automáticamente en la inserción
    protected $fillable = [
        'id_materia',
        'nombre',
        'id_carrera',
        'id_semestre',
        'clave_materia',
        'HRS_TEORICAS',
        'HRS_PRACTICAS',
        'creditos'
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'id_carrera', 'id_carrera');
    }

    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'grupo_materia', 'id_materia', 'id_grupo');
    }
}