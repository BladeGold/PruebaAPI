<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Corporativos extends Model
{
    use SoftDeletes;

    protected $table = 'tw_corporativos';

    protected $guarded = [  ];

    //Relaciones

    public function tw_empresas() {

        return $this->hasMany(EmpresasCorporativos::class, 'tw_corporativos_id');
    }

    public function tw_documentos(){

        return $this->belongsToMany(Documentos::class, 'tw_documentos_corporativos', 'tw_corporativos_id', 'tw_documentos_id');
    }

    public function tw_contratos(){

        return $this->hasMany(ContratosCorporativos::class, 'tw_corporativos_id');
    }

    public function tw_contactos(){

        return $this->hasMany(ContactosCorporativos::class, 'tw_corporativos_id');
    }

    //Relacion Inversa con Usuarios

    public function tw_usuario(){

        return $this->belongTo(User::class, 'id');
    }
}
