<?php

namespace App\Http\Resources\Empresas;

use Illuminate\Http\Resources\Json\JsonResource;

class EmpresasResource extends JsonResource
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
            'S_RazonSocial' => $this->resource->S_RazonSocial,
            'S_RFC' => $this->resource->S_RFC,
            'S_Activo' => $this->resource->S_Activo,
            
            'link' => [
                'self' => route('empresa.show', $this->resource),
            ]
            
        ];
    }
}
