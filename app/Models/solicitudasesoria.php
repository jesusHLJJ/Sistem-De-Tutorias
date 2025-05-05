<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class solicitudasesoria extends Model
{
    use HasFactory;
    protected $table = 'solicitud_asesoria';
    protected $primaryKey = 'id_solicitud';

    public $timestamps = true;
    protected $fillable = [
        'id_profesor',
        'id_materia',
        'id_alumno',
        'fecha',
        'medio_didactico_recurso',
        'temas_tratar_descripcion'


    ];

    public function materia()
    {
        return $this->belongsTo(Materias::class, 'id_materia');
    }
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'id_profesor', 'id_profesor');
    }
    public function alumno()
{
    return $this->belongsTo(Alumno::class, 'id_alumno', 'id_alumno');
}
}
