<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portafolio extends Model
{
    use HasFactory;

    // Relación uno a uno con carga academica
    public function cargaAcademica(){
        return $this->belongsTo('App\Models\CargaAcademica');
    }

    // Relación uno a muchos con revision
    public function revisiones(){
        return $this->hasMany('App\Models\Revision');
    }
}
