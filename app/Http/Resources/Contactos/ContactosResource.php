<?php

namespace App\Http\Resources\Contactos;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactosResource extends JsonResource
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
            'S_Puesto' => $this->resource->S_Puesto,
            
            
            'link' => [
                'self' => route('contacto.show', $this->resource),
            ]
            
        ];
    }
}
