<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;


    protected $table = 'carreras';
    protected $primaryKey = 'id_carrera';

    protected $fillable = ['carrera']; // Ajusta esto según los campos de tu tabla

public function jefecarrera()
{
    return $this->belongsTo(JefesCarrera::class, 'id_carrera', 'id_carrera');
}





}




