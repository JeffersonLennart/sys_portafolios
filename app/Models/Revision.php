<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    use HasFactory;

    // Relación uno a muchos con portafolios (inversa)
    public function portafolio(){
        return $this->belongsTo('App\Models\Portafolio');
    }

    // Relación uno a muchos con revisores (inversa)
    public function revisor(){
        return $this->belongsTo('App\Models\Revisor');
    }

    // Relación uno a muchos con informes
    public function informes(){
        return $this->hasMany('App\Models\Informe');
    }
}
