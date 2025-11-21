<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grupo;
use App\Models\Carrera;
class Alumno extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_alumno';
    protected $fillable = [
        'id_alumno',
        'id_grupo',
        'id_carrera',
        'user_id',
        'matricula',
        'nombre',
        'ap_paterno',
        'ap_materno',
        'telefono',
        'estatus_canalizacion'
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

public function getNombreCompletoAttribute()
{
    return "{$this->nombre} {$this->ap_paterno} {$this->ap_materno}";
}

public function grupo()
{
    return $this->belongsTo(Grupo::class, 'id_grupo','id_grupo');  // Asegúrate de usar 'id_grupo' como el nombre de la columna //SE INSERÓ CÓDIGO DE PRUEBA
}

public function carrera()
{
    return $this->belongsTo(Carrera::class, 'id_carrera');
}


public function canalizacion(){
    return $this->belongsTo(Canalizacion::class,'id_alumno','id_alumno');
}


}
