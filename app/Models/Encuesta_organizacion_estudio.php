<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Encuesta_organizacion_estudio extends Model
{
    use HasFactory;

    protected $table = 'encuesta_organizacion_estudio';
    //llave primaria de la tabla
    protected $primaryKey = 'id_encuesta_organizacion';
    //indicamos que desactive el timestamps, para evitar errores.
    public $timestamps = false;
    //campos de la tabla para el llenado. 
    protected $fillable = [
        'id_alumno',
        'pregunta_1_organizacion',
        'pregunta_2_organizacion',
        'pregunta_3_organizacion',
        'pregunta_4_organizacion',
        'pregunta_5_organizacion',
        'pregunta_6_organizacion',
        'pregunta_7_organizacion',
        'pregunta_8_organizacion',
        'pregunta_9_organizacion',
        'pregunta_10_organizacion',
        'pregunta_11_organizacion',
        'pregunta_12_organizacion',
        'pregunta_13_organizacion',
        'pregunta_14_organizacion',
        'pregunta_15_organizacion',
        'pregunta_16_organizacion',
        'pregunta_17_organizacion',
        'pregunta_18_organizacion',
        'pregunta_19_organizacion',
        'pregunta_20_organizacion',
        'calificacion_final_organizacion',
    ];

    //CODIGO DEPRUEBA
    public function alumno(){
        return $this->belongsTo(Alumno::class,'id_alumno','id_alumno');
    }
    //CODIGO DEPRUEBA
}
