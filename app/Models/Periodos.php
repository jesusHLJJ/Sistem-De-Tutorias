<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodos extends Model
{
    use HasFactory;

    protected $table = 'periodos';  // Asegúrate de que el nombre de la tabla sea correcto
    protected $primaryKey = 'id_periodo';  // Ajusta esto según la clave primaria de tu tabla

    // Campos que se pueden llenar automáticamente en la inserción
    protected $fillable = ['periodo', 'semestre']; // Ajusta esto según los campos de tu tabla

    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'id_periodo');
    }
}