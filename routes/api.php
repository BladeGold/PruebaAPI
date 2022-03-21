<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function( ) {
    Route::post('login', 'Api\AuthController@login');
    Route::get('logout', 'Api\AuthController@logout')->middleware('auth:api');
});
Route::group(['prefix' => 'password'], function(){
    Route::post('forgotpassword', 'Api\ForgotPasswordController@forgotPassword');
    Route::post('resetpassword', 'Api\ForgotPasswordController@resetPassword')->name('password.reset');
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::apiResource('empresa', 'Api\EmpresasController');
    Route::apiResource('contacto', 'Api\ContactosController');
    Route::apiResource('contrato', 'Api\ContratosController');
    
});
Route::apiResource('corporativo', 'Api\CorporativosController');
    
    Route::apiResource('documento', 'Api\DocumentosController');

    Route::get('documentoscorporativos/{id}', 'Api\DocumentosController@documentosCorporativos');


    

       
   
