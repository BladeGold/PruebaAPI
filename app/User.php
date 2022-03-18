<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{   
    use HasApiTokens, Notifiable, SoftDeletes;
    
    protected $table= 'tw_usuarios';

   

    protected $guarded = [ ];


    protected $hidden = [
        'verification_token', 'password'
    ];
    


    //Relacion Uno a Muchos
    public function Corporativos(){
        return $this->belongsTo(Corporativos::class, 'id','tw_usuarios_id');
    }
}
