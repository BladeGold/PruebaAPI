<?php

namespace App\Http\Resources\Contactos;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ContactosCollection extends ResourceCollection
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
            'contactos' =>ContactosResource::collection($this->collection),
        ];
    }
}
