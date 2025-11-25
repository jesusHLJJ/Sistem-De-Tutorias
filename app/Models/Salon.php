<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    protected $table = 'salones';
    protected $primaryKey = 'id_salon';
    public $timestamps = true;

    protected $fillable = [
        'clave_salon'
    ];

    /**
     * Relación con grupos
     */
    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'id_salon', 'id_salon');
    }
}
