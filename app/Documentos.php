<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    protected $table= 'tw_documentos';

    protected $guarded = [  ];

    //Relaciones

    public function Corporativo(){
        return $this->belongsToMany(Corporativos::class, 'tw_documentos_corporativos');
    }
}
