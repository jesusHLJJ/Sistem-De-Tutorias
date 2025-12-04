<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $table = 'turnos';
    protected $primaryKey = 'id_turno';
    public $timestamps = false;

    protected $fillable = [
        'turno',
        'clave_turno'
    ];

    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'id_turno');
    }
}