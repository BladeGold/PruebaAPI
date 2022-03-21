<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Corporativos;
use App\Http\Resources\Corporativos\CorporativoResource;
use App\Http\Resources\Corporativos\CorporativosCollection;


use Validator;

class CorporativosController extends Controller
{
    public function index()
    {
        $corporativos = Corporativos::paginate(2);
        if($corporativos->count() < 1){
            return response()->json(['message' => 'No Content'], 204);
        }
        
        return CorporativosCollection::make($corporativos);
           
    }
    

    public function store(Request $request)
    {
        
        $rules = [
            
            'S_NombreCorto' => 'required|string|max:45',
            'S_NombreCompleto' => 'required|string|max:75',
            'S_LogoUrl' => 'string|max:255',
            'S_DBName' => 'required|string|max:45',
            'S_DBUsuario' => 'required|string|max:45',
            'S_DBPassword' => 'required|max:150',
            'S_SystemUrl' => 'required|string|max:45',
            'S_Activo' => 'required|integer|max:1',
            'D_FechaIncorporacion' => 'required|date',
            
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Validation Fail'
            ], 400);
        }
        $corporativo = Corporativos::create($request->all());
        return response()->json([
            'corporativo' => CorporativoResource::make($corporativo),
            'message' => 'created Successfully'
        ], 201);       

    }


    public function show($corporativo)
    {        
      
        $corporativo = Corporativos::findOrFail($corporativo);
        $corporativo->tw_empresas;
        $corporativo->tw_contactos;
        $corporativo->tw_contratos;
        $corporativo->tw_documentos;

        
        return CorporativoResource::make($corporativo);
    }

    public function update(Request $request, Corporativos $corporativo)
    {
        $corporativo->update($request->all());
        return response()->json([
            'corporativo' => CorporativoResource::make($corporativo),
            'message' => 'Update Successfully'
        ], 202);
    }

    public function destroy(Corporativos $corporativo)
    {
        $corporativo->delete();

        return response()->json([
            
            'message' => 'Delete Successfully'
        ], 202);
    }


}
