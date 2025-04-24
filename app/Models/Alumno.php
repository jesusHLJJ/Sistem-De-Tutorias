<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grupo;
use App\Models\Carrera;
class Alumno extends Model
{
    use HasFactory;

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
    return $this->belongsTo(Grupo::class, 'id_grupo');
}

public function carrera()
{
    return $this->belongsTo(Carrera::class, 'id_carrera');
}
}
