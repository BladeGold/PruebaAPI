<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresasCorporativos extends Model
{
    protected $table = 'tw_empresas_corporativos';

    protected $guarded = [  ];

    
    //Relaciones

    public function Corporativo(){

        return $this->belongsTo(Corporativos::class);
    }
}
