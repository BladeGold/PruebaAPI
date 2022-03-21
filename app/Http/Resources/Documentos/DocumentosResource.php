<?php

namespace App\Http\Resources\Documentos;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            
            'id' => (string) $this->resource->getRouteKey(),
            'S_Nombre' => $this->resource->S_Nombre,
            'N_Obligatorio' => $this->resource->N_Obligatorio,
            
            
            'link' => [
                'self' => route('documento.show', $this->resource),
            ]
            
        ];
    }
}
