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
        'indicador_2',
        'indicador_3',
        'indicador_4',
        'indicador_5',
        'indicador_6',
        'indicador_7',
        'indicador_8',
        'indicador_9',
        'indicador_10',
        'indicador_11',
        'indicador_12',
        'indicador_13',
        'indicador_14',
        'indicador_15',
        'indicador_16',
        'indicador_17',
        'indicador_18',
        'indicador_19',
        'indicador_20',
        'indicador_21',
        'indicador_22',
        'indicador_23',
        'indicador_24',
        'indicador_25',
    ];
}
