<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revisor extends Model
{
    use HasFactory;

    // Relación uno a muchos con user (inversa)
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    // Relación muchos a muchos con Docente
    public function docentes(){
        return $this->belongsToMany('App\Models\Docente');
    }    

    // Relación uno a muchos con revisiones
    public function revisiones(){
        return $this->hasMany('App\Models\Revision');
    }

    // Relación uno a muchos con informes
    public function informes(){
        return $this->hasMany('App\Models\Informe');
    }
}
