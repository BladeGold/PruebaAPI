<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function( ) { Route::post('login', 'Api\AuthController@login'); });


        

        Route::group(['middleware' => 'auth:api'
        ], function() {
            Route::get('logout', 'Api\AuthController@logout');
            
        });
        Route::apiResource('corporativo', 'Api\CorporativosController');
        Route::apiResource('empresa', 'Api\EmpresasController');

    

       
   
