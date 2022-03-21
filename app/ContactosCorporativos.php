<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactosCorporativos extends Model
{
    protected $table = 'tw_contactos_corporativos';

    protected $guarded = [  ];
    public $timestamps = false;

    //Relaciones
    
    public function tw_corporativo(){

        return $this->belongsTo(Corporativos::class);
    }
}
