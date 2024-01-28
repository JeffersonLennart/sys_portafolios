<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    use HasFactory;

    // Relación uno a muchos con asignación docente-revisor
    public function asignacionesDocenteRevisor(){
        return $this->hasMany('App\Models\DocenteRevisor');
    }
    
    // Relación uno a muchos con carga academica
    public function cargasAcademicas(){
        return $this->hasMany('App\Models\CargaAcademica');
    }
}
