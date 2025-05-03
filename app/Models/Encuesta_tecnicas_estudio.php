<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta_tecnicas_estudio extends Model
{
    use HasFactory;

    protected $table = 'encuesta_tecnicas_estudio';
    //llave primaria de la tabla
    protected $primaryKey = 'id_encuesta_tecnica';
    //indicamos que desactive el timestamps, para evitar errores.
    public $timestamps = false;
    //campos de la tabla para el llenado. 
    protected $fillable = [
        'id_alumno',
        'pregunta_1_tecnica',
        'pregunta_2_tecnica',
        'pregunta_3_tecnica',
        'pregunta_4_tecnica',
        'pregunta_5_tecnica',
        'pregunta_6_tecnica',
        'pregunta_7_tecnica',
        'pregunta_8_tecnica',
        'pregunta_9_tecnica',
        'pregunta_10_tecnica',
        'pregunta_11_tecnica',
        'pregunta_12_tecnica',
        'pregunta_13_tecnica',
        'pregunta_14_tecnica',
        'pregunta_15_tecnica',
        'pregunta_16_tecnica',
        'pregunta_17_tecnica',
        'pregunta_18_tecnica',
        'pregunta_19_tecnica',
        'pregunta_20_tecnica',
        'calificacion_final_tecnica',
    ];
}
