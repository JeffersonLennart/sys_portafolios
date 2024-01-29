<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;
    protected $table = 'asignaturas';

    protected $fillable = [
        'nombre',
        'tipo',            
        'codigo',
        'escuela',  
        'categoria', 
        'creditos',              
    ];
    // Relación uno a muchos con carga academica
    public function cargasAcademicas(){
        return $this->hasMany('App\Models\CargaAcademica');
    }
}
