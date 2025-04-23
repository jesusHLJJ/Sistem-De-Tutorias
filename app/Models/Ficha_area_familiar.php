<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha_area_familiar extends Model
{
    use HasFactory;

    protected $table = 'ficha_area_familiar';
    //llave primaria de la tabla
    protected $primaryKey = 'id_area_familiar';
    //indicamos que desactive el timestamps, para evitar errores.
   // public $timestamps = false;
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
    ];
}
