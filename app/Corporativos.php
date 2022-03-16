<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corporativos extends Model
{
    protected $table = 'tw_corporativos';

    protected $guarded = [  ];

    //Relaciones

    public function Empresas() {

        return $this->hasMany(EmpresasCorporativo::class);
    }

    public function Documentos(){

        return $this->belongsToMany(Documentos::class, 'tw_documentos_corporativos');
    }

    public function Contratos(){

        return $this->hasMany(ContratosCorporativos::class);
    }

    public function Contactos(){

        return $this->hasMany(ContactosCorporativos::class);
    }

    //Relacion Inversa con Usuarios

    public function Usuario(){

        return $this->belongsTo(Usuarios::class);
    }
}
