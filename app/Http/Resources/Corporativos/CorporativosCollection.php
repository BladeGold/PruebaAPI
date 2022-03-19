<?php

namespace App\Http\Resources\Corporativos;

use Illuminate\Http\Resources\Json\ResourceCollection;


class CorporativosCollection extends ResourceCollection
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
            'corporativos' =>CorporativosResource::collection($this->collection),
        ];
    }
}
