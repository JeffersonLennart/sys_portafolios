<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;
    protected $table = 'informes';

    protected $fillable = [
        'revision_id',
        'revisor_id',   
        'fecha_informe',   
        'cumplimiento',              
    ];
    
    // Relación uno a muchos con revisores (inversa)
    public function revisor(){
        return $this->belongsTo('App\Models\Revisor');
    }

    // Relación uno a muchos con revisiones (inversa)
    public function revision(){
        return $this->belongsTo('App\Models\Revision');
    }
}
