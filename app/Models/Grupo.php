<?php

// app/Models/Grupo.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Semestres;

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
/*
    public function turno()
    {
        return $this->belongsTo(Turno::class, 'id_turno');
    }

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'id_profesor');
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'id_periodo');
    }

    public function salon()
    {
        return $this->belongsTo(Salon::class, 'id_salon');
    }
    Conforme se vayan ocupando, vamos creando los modelos    
    */ 
}
