<?php

namespace App\Http\Resources\Corporativos;

use Illuminate\Http\Resources\Json\JsonResource;

class CorporativosResource extends JsonResource
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
            'S_NombreCorto' => $this->resource->S_NombreCorto,
            'S_NombreCompleto' => $this->resource->S_NombreCompleto,
            'S_LogoUrl' => $this->resource->S_LogoUrl,
            
            'link' => [
                'self' => route('corporativo.show', $this->resource),
            ]
            
        ];
    }
}
