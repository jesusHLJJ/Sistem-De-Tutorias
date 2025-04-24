<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caracteristicas_personales extends Model
{
    use HasFactory;

    protected $table = 'caracteristicas_personales';
    //llave primaria de la tabla
    protected $primaryKey = 'id_caracteristica_personal';
    //indicamos que desactive el timestamps, para evitar errores.
    public $timestamps = false;
    //campos de la tabla para el llenado. 
    protected $fillable = [
        'id_ficha',
        'indicador_1',
        'observacion_1',
        'indicador_2',
        'observacion_2',
        'indicador_3',
        'observacion_3',
        'indicador_4',
        'observacion_4',
        'indicador_5',
        'observacion_5',
        'indicador_6',
        'observacion_6',
        'indicador_7',
        'observacion_7',
        'indicador_8',
        'observacion_8',
        'indicador_9',
        'observacion_9',
        'indicador_10',
        'observacion_10',
        'indicador_11',
        'observacion_11',
        'indicador_12',
        'observacion_12',
        'indicador_13',
        'observacion_13',
        'indicador_14',
        'observacion_14',
        'indicador_15',
        'observacion_15',
        'indicador_16',
        'observacion_16',
        'indicador_17',
        'observacion_17',
        'indicador_18',
        'observacion_18',
        'indicador_19',
        'observacion_19',
        'indicador_20',
        'observacion_20',
        'indicador_21',
        'observacion_21',
        'indicador_22',
        'observacion_22',
        'indicador_23',
        'observacion_23',
        'indicador_24',
        'observacion_24',
        'indicador_25',
        'observacion_25',
    ];
}
