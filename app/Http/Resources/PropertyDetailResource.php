<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyDetailResource extends JsonResource
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
            'furnished_type'   => $this->furnished_type,
            'saller_type'      => $this->saller_type,
            'property_for'     => $this->property_for,
            'price_duration'   => $this->price_duration,
            'age_of_property'  => $this->age_of_property,
            'maintenance'      => $this->maintenance,
            'security_deposit' => $this->security_deposit,
            'brokerage'        => $this->brokerage,
            'bhk'              => $this->bhk,
            'sqft'             => $this->sqft,
            'description'      => $this->description,
            'country'          => $this->country,
            'state'            => $this->state,
            'city'             => $this->city,
            'latitude'         => $this->latitude,
            'longitude'        => $this->longitude,
            'address'          => $this->address,
            'video_url'        => $this->video_url,
            'status'           => $this->status,
            'premium_property' => $this->premium_property,
            'property_image'   => getSingleMedia($this, 'property_image',null),
            'property_gallary' => getAttachments($this->getMedia('property_gallary')),
            'property_gallary_array'  => getAttachmentArray( $this->getMedia('property_gallary'), null),
            'created_at'       => $this->created_at,
            'updated_at'       => $this->updated_at,
            'is_favourite'     => $this->userFavouriteProperty->where('user_id',$user_id)->first() ? 1 : 0,
            'advertisement_property' => $this->advertisement_property,
            'advertisement_property_date' => $this->advertisement_property_date,
            'checked_property_inquiry' => $this->userInquiredProperty->where('customer_id',$user_id)->first() ? 1 : 0,
        ];
    }
}
