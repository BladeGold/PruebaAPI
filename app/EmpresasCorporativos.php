<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmpresasCorporativos extends Model
{
    use SoftDeletes;

    protected $table = 'tw_empresas_corporativos';

    protected $guarded = [  ];

    
    //Relaciones

    public function Corporativo(){

        return $this->belongsTo(Corporativos::class);
    }
}
