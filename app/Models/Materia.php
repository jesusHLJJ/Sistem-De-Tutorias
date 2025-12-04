<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $table = 'materias';
    protected $primaryKey = 'id_materia';

    // Campos que se pueden llenar automáticamente en la inserción
    protected $fillable = [
        'id_materia',
        'nombre',
    ];

    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'grupo_materia', 'id_materia', 'id_grupo')
            ->withTimestamps();
    }
}