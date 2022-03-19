<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\EmpresasCorporativos as Empresas;
use App\Http\Resources\Empresas\EmpresaResource;
use App\Http\Resources\Empresas\EmpresasCollection;

use Validator;

class EmpresasController extends Controller
{
    public function index()
    {     
        $empresas = Empresas::paginate(2);
        
        if($empresas->count() < 1){
            return response()->json(['message' => 'No Content'],204);
        }
       
        return EmpresasCollection::make($empresas);
           
    }


    public function store(Request $request)
    {
        
        $rules = [
            
            'S_RazonSocial' => 'required|max:150',
            'S_RFC' => 'required|max:13',
            'S_Pais' => 'string|max:75',
            'S_Estado' => 'string|max:75',
            'S_Municipio' => 'string|max:75',
            'S_ColoniaLocalidad' => 'string|max:75',
            'S_Domicilio' => 'max:100',
            'S_CodigoPostal' => 'max:5', 
            'S_UsoCFDI'  => 'max:45',
            'S_UrlRFC' => 'max:255', 
            'S_UrlActaConstitutiva' => 'max:255',
            'S_Activo' => 'required|integer|max:1',
            'S_Comentarios' => 'string|max:255', 
            'tw_corporativos_id' => 'required|integer|exists:App\Corporativos,id'
            
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Validation Fail'
            ], 400);
        }
        $empresa = Empresas::create($request->all());
        return response([
            'empresa' => EmpresaResource::make($empresa),
            'message' => 'created Successfully'
        ], 201);      

    }


    public function show($empresa)
    {        
      
        $empresa = Empresas::findOrFail($empresa);
               
        return EmpresaResource::make($empresa);
    }

    public function update(Request $request, Empresas $empresa)
    {
        $empresa->update($request->all());
        return response([
            'empresa' => EmpresaResource::make($empresa),
            'message' => 'Update Successfully'
        ], 202);
    }

    public function destroy(Empresas $empresa)
    {
        $empresa->delete();

        return response([
            
            'message' => 'Delete Successfully'
        ], 202);
    }


}
