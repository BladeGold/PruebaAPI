<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CorporativoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return
             $this->resource;
    
    }

    public function with($request)
    {
        return $request;
    }

    public function withResponse($request, $response)
    {
       
    }
}
