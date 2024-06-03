<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyAmenityResource extends JsonResource
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
            'id'            => $this->id,
            'property_id'   => $this->property_id,
            'amenity_id'    => $this->amenity_id,
            'name'          => optional($this->amenity)->name,
            'type'          => optional($this->amenity)->type,
            'value'         => in_array(optional($this->amenity)->type, ['checkbox'] ) ? json_decode($this->value,true) : $this->value,
            'amenity_image' => getSingleMedia($this->amenity, 'amenity_image', null),
        ];
    }
}
