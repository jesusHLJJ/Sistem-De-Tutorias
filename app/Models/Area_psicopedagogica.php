<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area_psicopedagogica extends Model
{
    use HasFactory;
    protected $table = 'area_psicopedagogica';
    //llave primaria de la tabla
    protected $primaryKey = 'id_area_psicopedagogica';
    //indicamos que desactive el timestamps, para evitar errores.
    // public $timestamps = false;
    //campos de la tabla para el llenado. 
    protected $fillable = [
        'id_ficha',
        'indicador_psicopedagogico_1',
        'indicador_psicopedagogico_2',
        'indicador_psicopedagogico_3',
        'indicador_psicopedagogico_4',
        'indicador_psicopedagogico_5',
        'indicador_psicopedagogico_6',
        'indicador_psicopedagogico_7',
        'indicador_psicopedagogico_8',
        'indicador_psicopedagogico_9',
        'plan_vida_carrera_1',
        'plan_vida_carrera_2',
        'caracteristicas_personales_1',
        'caracteristicas_personales_2',
        'caracteristicas_personales_3',
        'caracteristicas_personales_4',
        'caracteristicas_personales_5',
    ];

    //CODIGOPRUEBA//
    function fichaTutorado()
    {
        return $this->belongsTo(FichaIdentificacionTutorado::class, 'id_ficha', 'id_ficha');
    }
    //CODIGOPRUEBA//
}
