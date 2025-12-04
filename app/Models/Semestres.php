<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semestres extends Model
{
    use HasFactory;

    protected $table = 'semestres'; // nombre real de la tabla
    protected $primaryKey = 'id_semestre'; // clave primaria personalizada

    protected $fillable = [
        'semestre',
        'clave_semestre',
    ];

    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'id_semestre');
    }
}