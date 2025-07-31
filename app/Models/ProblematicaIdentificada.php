<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProblematicaIdentificada extends Model
{
    protected $table = 'problematica_identificada';
    protected $primaryKey = 'id_problematica';
    public $timestamps = false;

    protected $fillable = [
        'tipo_problematica'
    ];

    public function tutorias()
    {
        return $this->hasMany(MensualTutoria::class, 'id_problematica', 'id_problematica');
    }
}
