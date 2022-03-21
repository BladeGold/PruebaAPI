<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\ContactosCorporativos as Contactos;
use App\Http\Resources\Contactos\ContactoResource;
use App\Http\Resources\Contactos\ContactosCollection;

use Validator;

class ContactosController extends Controller
{
    public function index()
    {     
        $contactos = Contactos::paginate(2);
        
        if($contactos->count() < 1){
            return response()->json(['message' => 'No Content'],204);
        }
       
        return ContactosCollection::make($contactos);
           
    }

    public function store(Request $request)
    {
      
        $rules = [
            'S_Nombre' => 'required|string|max:45',
            'S_Puesto' => 'required|string|max:45',
            'S_Comentario' => 'string|max:255',
            'N_TelefonoFijo' => 'digits:10',
            'N_TelefonoMovil' => 'digits:10',
            'S_Email' => 'email|required|max:45', 
            'tw_corporativos_id' => 'required|integer|exists:App\Corporativos,id',            
        ];

        $validator = Validator::make($request->all(), $rules); 
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Validation Fail'
            ], 400);
        }
        
       $contacto = Contactos::create($request->all());
        return response()->json([
            'contacto' => ContactoResource::make($contacto),
            'message' => 'created Successfully'
        ], 201);      

    }

    public function show($contacto)
    {       
        $contacto = Contactos::findOrFail($contacto);               
        return ContactoResource::make($contacto);
    }

    public function update(Request $request, Contactos $contacto)
    {
        $contacto->update($request->all());
        return response()->json([
            'contacto' => ContactoResource::make($contacto),
            'message' => 'Update Successfully'
        ], 202);
    }

    public function destroy(Contactos $contacto)
    {
        $contacto->delete();

        return response()->json([
            'message' => 'Delete Successfully'
        ], 202);
    }
}
