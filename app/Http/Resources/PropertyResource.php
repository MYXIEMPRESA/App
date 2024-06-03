<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user_id = auth()->id() ?? null;
        
        return [
            'id'               => $this->id,
            'name'             => $this->name,
            'category_id'      => $this->category_id,
            'category'         => optional($this->category)->name,
            'category_image'   => getSingleMedia($this->category,'category_image',null),
            'price'            => $this->price,
            'price_format'     => getPriceFormat($this->price),
            'address'          => $this->address,
            'status'           => $this->status,
            'premium_property' => $this->premium_property,
            'price_duration'   => $this->price_duration,
            'property_image'   => getSingleMedia($this, 'property_image',null),
            'is_favourite'     => $this->userFavouriteProperty->where('user_id',$user_id)->first() ? 1 : 0,
            'property_for'     => $this->property_for,
            'advertisement_property' => $this->advertisement_property,
            'advertisement_property_date' => $this->advertisement_property_date,
        ];
    }
}
