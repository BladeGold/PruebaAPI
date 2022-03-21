<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Documentos;
use App\Http\Resources\Documentos\DocumentoResource;
use App\Http\Resources\Documentos\DocumentosCollection;

use Validator;
use Exception;
class DocumentosController extends Controller
{
    public function index()
    {     
        $documentos = Documentos::paginate(2);
        
        if($documentos->count() < 1){
            return response()->json(['message' => 'No Content'],204);
        }
       
        return DocumentosCollection::make($documentos);
           
    }

    public function store(Request $request)
    {
      
        $rules = [
            'S_Nombre' => 'required|string|max:45',
            'N_Obligatorio' => 'required|integer|max:1',
            'S_Descripcion' => 'max:255',
            'tw_corporativos_id' => 'exists:App\Corporativos,id',           
        ];

        $validator = Validator::make($request->all(), $rules); 
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Validation Fail'
            ], 400);
        }
        $data = $request->only('S_Nombre', 'N_Obligatorio', 'S_Descripcion');

        $documento = Documentos::create($data);

        if( $corporativo = $request->get('tw_corporativos_id') != null){
            $url = $request->get('S_ArchivoUrl');
            $documento->documentosCorporativos($corporativo, $url);
        }
        
        return response()->json([
            'documento' => DocumentoResource::make($documento),
            'message' => 'created Successfully'
        ], 201);    

    }

    public function show($documento)
    {       
        
        $documento = Documentos::findOrFail($documento);           
        return DocumentoResource::make($documento);
    }

    public function update(Request $request, Documentos $documento)
    {  
        $data = $request->only('S_Nombre', 'N_Obligatorio', 'S_Descripcion');
        $documento->update($data);
   
        
        if( $corporativo = $request->get('tw_corporativos_id') != null){
            $url = $request->get('S_ArchivoUrl');
            $documento->documentosCorporativos($corporativo, $url);
        }
        return response()->json([
            'documento' => DocumentoResource::make($documento),
            'message' => 'Update Successfully'
        ], 202); 
    }

    public function destroy(Documentos $documento)
    {
        $documento->delete();

        return response()->json([
            'message' => 'Delete Successfully'
        ], 202);
    }

    public function documentosCorporativos($documento){
        $documento = Documentos::has('corporativos')->where('id', '=', $documento)->first();
        if( !$documento == null){
            $documentoCP = $documento->Corporativos;
            return DocumentoResource::make($documento);
        }
        
        return response()->json([
            'errors' => [
                'message' => 'Not Found'
            ] 
        ],400);
         
    }


}
