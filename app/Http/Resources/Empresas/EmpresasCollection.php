<?php

namespace App\Http\Resources\Empresas;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EmpresasCollection extends ResourceCollection
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
            'empresas' =>EmpresasResource::collection($this->collection),
        ];
    }
}
