<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'            =>$this->id,
            'name'          =>$this->name,
            'image'         =>'images/'.$this->image,
            'status'        =>$this->status,
            'quantity'      =>$this->quantity,
            'price'         =>$this->price,
            'description'   =>$this->description,
            'propertie'     =>PropertieResource::collection($this->propertie),
            'variation'   =>VariationResource::collection($this->variation),
        ];
    }
}
