<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area_social extends Model
{
    use HasFactory;
    protected $table = 'area_social';
    //llave primaria de la tabla
    protected $primaryKey = 'id_area_social';
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
    ];
}
