<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Canalizacion extends Model
{
     // Tabla personalizada
    protected $table = 'canalizacion';

    protected $primaryKey = 'id_canalizacion';


    public function canalizacioncitas(){
        return $this->hasMany(Canalizacioncita::class,'id_canalizacion','id_canalizacion');
    }

    public function alumno(){
        return $this->belongsTo(Alumno::class,'id_alumno','id_alumno');
    }
}
