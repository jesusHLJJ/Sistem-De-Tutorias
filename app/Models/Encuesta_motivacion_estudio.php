<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta_motivacion_estudio extends Model
{
    use HasFactory;

    protected $table = 'encuesta_motivacion_estudio';
    //llave primaria de la tabla
    protected $primaryKey = 'id_encuesta_motivacion';
    
    //campos de la tabla para el llenado. 
    protected $fillable = [
        'id_alumno',
        'pregunta_1_motivacion',
        'pregunta_2_motivacion',
        'pregunta_3_motivacion',
        'pregunta_4_motivacion',
        'pregunta_5_motivacion',
        'pregunta_6_motivacion',
        'pregunta_7_motivacion',
        'pregunta_8_motivacion',
        'pregunta_9_motivacion',
        'pregunta_10_motivacion',
        'pregunta_11_motivacion',
        'pregunta_12_motivacion',
        'pregunta_13_motivacion',
        'pregunta_14_motivacion',
        'pregunta_15_motivacion',
        'pregunta_16_motivacion',
        'pregunta_17_motivacion',
        'pregunta_18_motivacion',
        'pregunta_19_motivacion',
        'pregunta_20_motivacion',
        'calificacion_final_motivacion',
    ];
}
