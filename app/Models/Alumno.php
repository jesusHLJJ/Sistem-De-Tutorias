<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
