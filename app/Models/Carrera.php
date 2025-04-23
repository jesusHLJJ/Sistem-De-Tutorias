<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;


    protected $table = 'carreras';

    protected $fillable = ['carrera']; // Ajusta esto según los campos de tu tabla
}
