<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portafolio extends Model
{
    use HasFactory;
    protected $table = 'portafolios';

    protected $fillable = [
        'carga_academica_id',
        'tipo_portafolio',              
    ];
    // Relación uno a uno con carga academica
    public function cargaAcademica(){
        return $this->belongsTo('App\Models\CargaAcademica');
    }

    // Relación uno a muchos con revision
    public function revisiones(){
        return $this->hasMany('App\Models\Revision');
    }
}
