<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\ContratosCorporativos as Contratos;
use App\Http\Resources\Contratos\ContratoResource;
use App\Http\Resources\Contratos\ContratosCollection;

use Validator;

class ContratosController extends Controller
{
    public function index()
    {     
        $contratos = Contratos::paginate(2);
        
        if($contratos->count() < 1){
            return response()->json(['message' => 'No Content'],204);
        }
       
        return ContratosCollection::make($contratos);
           
    }

    public function store(Request $request)
    {
      
        $rules = [
            'D_FechaInicio' => 'required|date',
            'D_FechaFin' => 'required|date',
            'S_URLContrato' => 'max:255',
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
        
       $contrato = Contratos::create($request->all());
        return response()->json([
            'contrato' => ContratoResource::make($contrato),
            'message' => 'created Successfully'
        ], 201);      

    }

    public function show($contrato)
    {       
        $contrato = Contratos::findOrFail($contrato);               
        return ContratoResource::make($contrato);
    }

    public function update(Request $request, Contratos $contrato)
    {
        $contrato->update($request->all());
        return response()->json([
            'contrato' => ContratoResource::make($contrato),
            'message' => 'Update Successfully'
        ], 202);
    }

    public function destroy(Contratos $contrato)
    {
        $contrato->delete();

        return response()->json([
            'message' => 'Delete Successfully'
        ], 202);
    }

}
