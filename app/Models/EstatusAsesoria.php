<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstatusAsesoria extends Model
{
    protected $table = 'estatus_asesoria';
    protected $primaryKey = 'id_estatus';
    public $incrementing = false;
    protected $fillable = ['id_estatus', 'nombre'];
}
