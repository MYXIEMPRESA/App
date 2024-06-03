<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource  extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        
        return [
            'id'                  => $this->id,
            'name'                => $this->name,
            'duration_unit'       => $this->duration_unit,
            'duration'            => $this->duration,
            'price'               => $this->price,
            'property'            => $this->property,
            'add_property'        => $this->add_property,
            'advertisement'       => $this->advertisement,
            'view_property_limit' => $this->property_limit,
            'add_property_limit'  => $this->add_property_limit,
            'advertisement_limit' => $this->advertisement_limit,
            'status'              => $this->status,
            'description'         => $this->description,
            'created_at'          => $this->created_at,
            'updated_at'          => $this->updated_at,
        ];
    }
}