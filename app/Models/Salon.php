<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    protected $table = 'salones';
    protected $primaryKey = 'id_salon';
    public $timestamps = false;

    protected $fillable = [
        'clave_salon'
    ];
}
