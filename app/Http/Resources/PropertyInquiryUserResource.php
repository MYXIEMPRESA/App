<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyInquiryUserResource extends JsonResource
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
            'property_name' => optional($this->property)->name,
            'customer_id'   => $this->customer_id,
            'customer_name' => optional($this->user)->display_name,
            'contact_number' => optional($this->user)->contact_number,
            'customer_profile_image'=> getSingleMedia($this->user, 'profile_image', null) ,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ];
    }
}
