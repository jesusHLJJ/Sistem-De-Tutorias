<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaIdentificacionTutorado extends Model
{
    use HasFactory;
    protected $table = 'ficha_identificacion_tutorado';  // Asegúrate de que el nombre de la tabla sea correcto
    protected $primaryKey = 'id_ficha';  // Ajusta esto según la clave primaria de tu tabla

    // Desactivar timestamps si la tabla no tiene 'created_at' y 'updated_at'
   // public $timestamps = false;
    // Campos que se pueden llenar automáticamente en la inserción
    protected $fillable = [
        'id_alumno_tutoria',  // Debe ser el mismo nombre que en la tabla
        'id_periodo'.
        'id_carrera',
        'fecha',
    ];
        // Otros campos que quieras insertar
}
