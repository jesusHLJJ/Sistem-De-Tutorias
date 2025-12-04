<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;


    protected $table = 'carreras';
    protected $primaryKey = 'id_carrera';

    protected $fillable = ['carrera']; // Ajusta esto según los campos de tu tabla

    public function jefecarrera()
    {
        return $this->belongsTo(JefesCarrera::class, 'id_carrera', 'id_carrera');
    }

    public function profesores()
    {
        return $this->hasMany(Profesor::class, 'id_carrera');
    }

    public function grupos()
    {
        return $this->hasMany(Profesor::class, 'id_carrera');
    }

    public function alumnos()
    {
        return $this->hasMany(Alumno::class, 'id_carrera');
    }
}