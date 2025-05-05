<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha_identificacion_estado_psicofisiologico extends Model
{
    use HasFactory;

    //llamamos a la tabla
    protected $table = 'ficha_identificacion_estado_psicofisiologico';
    //llave primaria de la tabla
    protected $primaryKey = 'id_estado_psicofisiologico';
    //indicamos que desactive el timestamps, para evitar errores.
    //public $timestamps = false;
    //campos de la tabla para el llenado. 
    protected $fillable = [
        'id_ficha',
        'indicador_psicofisiologico_1',
        'indicador_psicofisiologico_2',
        'indicador_psicofisiologico_3',
        'indicador_psicofisiologico_4',
        'indicador_psicofisiologico_5',
        'indicador_psicofisiologico_6',
        'indicador_psicofisiologico_7',
        'indicador_psicofisiologico_8',
        'indicador_psicofisiologico_9',
        'indicador_psicofisiologico_10',
        'indicador_psicofisiologico_11',
    ];

    //CODIGO DEPRUEBA//
    public function fichaTutorado()
    {
        return $this->belongsTo(FichaIdentificacionTutorado::class, 'id_ficha', 'id_ficha');
    }
    //CODIGO DEPRUEBA//



}
