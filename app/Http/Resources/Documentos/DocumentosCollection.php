<?php

namespace App\Http\Resources\Documentos;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DocumentosCollection extends ResourceCollection
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
            'documentos' =>DocumentosResource::collection($this->collection),
        ];
    }
}
