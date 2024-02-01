<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory; 

    // Relación uno a muchos con user (inversa)
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    // Relación muchos a muchos con Revisor
    public function revisores(){
        return $this->belongsToMany('App\Models\Revisor');
    }


    // Relación uno a muchos con carga academica
    public function cargasAcademicas(){
        return $this->hasMany('App\Models\CargaAcademica');
    }

    // Relación muchos a muchos con revisor (inversa)
    public function DocenteRevisor(){        
        return $this->hasMany('App\Models\DocenteRevisor');
    }
}
