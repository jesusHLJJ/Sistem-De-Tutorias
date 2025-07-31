<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class plan_accion_tutoria extends Model
{
    protected $table = 'plan_accion_tutoria';

    protected $primaryKey = 'id_plan_accion';


    public function grupo(){
        return $this->belongsTo(Grupo::class,'id_grupo','id_grupo');
    }

}
