<?php

namespace App\Http\Resources\Corporativos;

use Illuminate\Http\Resources\Json\JsonResource;

class CorporativoResource extends JsonResource
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
            'corporativo' => $this->resource,
        ];
    }
}
