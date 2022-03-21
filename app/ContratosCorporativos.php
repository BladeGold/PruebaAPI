<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContratosCorporativos extends Model
{
    protected $table = 'tw_contratos_corporativos';
    public $timestamps = false;

    protected $guarded = [  ];


    //Relaciones
    
    public function Corporativo(){

        return $this->belongsTo(Corporativos::class);
    }
}
