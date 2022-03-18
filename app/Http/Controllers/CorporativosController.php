<?php

namespace App\Http\Controllers;

use App\Corporativos;
use Illuminate\Http\Request;
use App\Http\Resources\CorporativoResource;
use App\Http\Resources\CorporativosCollection;
use App\Http\Resources\CorporativoCollection;

use Validator;

class CorporativosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $corporativos = Corporativos::paginate(2);

        return CorporativosCollection::make($corporativos);
           
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        return response([
            'corporativo' => CorporativoResource::make($corporativo),
            'message' => 'created Successfully'
        ], 201);
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Corporativos  $corporativos
     * @return \Illuminate\Http\Response
     */
    public function show($corporativo)
    {        
      
        $corporativo = Corporativos::findOrFail($corporativo);
        $corporativo->tw_empresas;
        $corporativo->tw_contactos;
        $corporativo->tw_contratos;
        $corporativo->tw_documentos;

        
        return CorporativoCollection::make($corporativo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Corporativos  $corporativos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Corporativos $corporativo)
    {
        $corporativo->update($request->all());
        return response([
            'corporativo' => CorporativoResource::make($corporativo),
            'message' => 'Update Successfully'
        ], 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Corporativos  $corporativos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corporativos $corporativo)
    {
        $corporativo->delete();

        return response([
            
            'message' => 'Delete Successfully'
        ], 202);
    }
}
