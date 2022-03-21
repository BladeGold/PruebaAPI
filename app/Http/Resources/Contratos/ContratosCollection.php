<?php

namespace App\Http\Resources\Contratos;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ContratosCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'contratos' =>ContratosResource::collection($this->collection),
        ];
    }
}
