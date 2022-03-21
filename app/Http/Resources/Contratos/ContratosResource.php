<?php

namespace App\Http\Resources\Contratos;

use Illuminate\Http\Resources\Json\JsonResource;

class ContratosResource extends JsonResource
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
            'D_FechaInicio' => $this->resource->D_FechaInicio,
            'D_FechaFin' => $this->resource->S_FechaFin,
            
            
            'link' => [
                'self' => route('contrato.show', $this->resource),
            ]
            
        ];
    }
}
