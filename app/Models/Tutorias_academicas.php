<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutorias_academicas extends Model
{
    use HasFactory;
    protected $table = 'tutorias_academicas';  // Asegúrate de que el nombre de la tabla sea correcto
    protected $primaryKey = 'id_tutoria';  // Ajusta esto según la clave primaria de tu tabla

    // Desactivar timestamps si la tabla no tiene 'created_at' y 'updated_at'
   // public $timestamps = false;
    // Campos que se pueden llenar automáticamente en la inserción
    protected $fillable = [
        'id_profesor',
        'id_semestre',
        'id_grupo',
        'mes_reporte',
        'formacion_academica',
        'formacion_personal',
        'formacion_profesional',
    ];
}
