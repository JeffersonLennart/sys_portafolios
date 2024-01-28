<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocenteRevisor extends Model
{
    use HasFactory;
    protected $table = 'docente_revisor';

    // Relación uno a muchos con Semestre (inversa)
    public function semestre(){
        return $this->belongsTo('App\Models\Semestre');
    }
    
    // Relación muchos a muchos con docente (inversa)
    public function docente(){        
        return $this->belongsTo('App\Models\Docente');
    }
    // Relación muchos a muchos con revisor (inversa)
    public function revisor(){        
        return $this->belongsTo('App\Models\Revisor');
    }
}
