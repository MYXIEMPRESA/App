<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
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
            'id'              => $this->id,
            'category_id'     => $this->category_id,
            'category_name'   => optional($this->category)->name,
            'property_id'     => $this->property_id,
            'property_name'   => optional($this->property)->name,
            'property_city'   => optional($this->property)->city,
            'description'     => $this->description,
            'status'          => $this->status,
            'slider_image'    => getSingleMedia($this, 'slider_image',null),
            'created_at'      => $this->created_at,
            'updated_at'      => $this->updated_at,
        ];
    }
}
