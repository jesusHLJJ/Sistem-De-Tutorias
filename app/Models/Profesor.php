<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $table = 'profesores';
    protected $primaryKey = 'id_profesor';
    protected $fillable = [
        'id_carrera',
        'user_id',
        'clave',
        'nombre',
        'ap_paterno',
        'ap_materno',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'id_profesor', 'id_profesor');
    }
    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'id_carrera', 'id_carrera');
    }

    public function getNombreCompletoAttribute()
    {
        return trim(implode(' ', [
            $this->nombre,
            $this->ap_paterno,
            $this->ap_materno
        ]));
    }

    public function gruposAsignados()
    {
        return $this->belongsToMany(Grupo::class, 'grupo_profesor', 'id_profesor', 'id_grupo');
    }

    public function getEsTutorAttribute()
    {
        return $this->grupos()->exists();
    }
}
