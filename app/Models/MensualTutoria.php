<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MensualTutoria extends Model
{
    protected $table = 'mens_tutoria'; // nombre real de la tabla
    protected $primaryKey = 'id_mens_tutoria';
    public $timestamps = true; // Asume que no tiene created_at y updated_at

    protected $fillable = [
        'id_profesor',
        'id_alumno',
        'id_problematica',
        'mes_entrega',
        'analisis_metodo_aplicado',
        'area_canalizar'
    ];

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'id_profesor', 'id_profesor');
    }

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'id_alumno', 'id_alumno');
    }

    public function problematica()
    {
        return $this->belongsTo(ProblematicaIdentificada::class, 'id_problematica', 'id_problematica');
    }

}
