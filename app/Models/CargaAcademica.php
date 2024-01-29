<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargaAcademica extends Model
{
    use HasFactory;

    // Relación uno a muchos con docente (inversa)
    public function docente(){
        return $this->belongsTo('App\Models\Docente');
    }

    // Relación uno a muchos con asignatura (inversa)
    public function asignatura(){
        return $this->belongsTo('App\Models\Asignatura');
    }

    // Relación uno a muchos con docente (inversa)
    public function semestre(){
        return $this->belongsTo('App\Models\Semestres');
    }

    // Relación uno a uno con portafolio
    public function portafolio(){
        return $this->hasOne('App\Models\Portafolio');
    }
}
