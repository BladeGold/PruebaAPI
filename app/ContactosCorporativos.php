<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactosCorporativos extends Model
{
    protected $table = 'tw_contactos_corporativos';

    protected $guarded = [  ];

    //Relaciones
    
    public function Corporativo(){

        return $this->belongsTo(Corporativos::class);
    }
}
