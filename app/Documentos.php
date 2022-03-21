<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    protected $table= 'tw_documentos';
    public $timestamps = false;

    protected $guarded = [  ];

    //Relaciones

    public function Corporativos(){
        return $this->belongsToMany(Corporativos::class, 'tw_documentos_corporativos','tw_documentos_id','tw_corporativos_id')
                        ->withPivot('S_ArchivoUrl');
    }

    public function documentosCorporativos($id, $url=NULL){
        $this->Corporativo()->attach($id, ['S_ArchivoUrl' => $url]);
    }
}
