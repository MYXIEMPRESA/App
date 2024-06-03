<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $selected_amenity = $this->categoryAmenityMapping->mapWithKeys(function ($item) {
            $item->amenity['amenity_image'] = getSingleMedia($item->amenity, 'amenity_image',null);
            unset($item->amenity->media);
            return [ $item->amenity_id => $item->amenity ];
        })->toArray();

        return [
            'id'              => $this->id,
            'name'            => $this->name,
            'status'          => $this->status,
            'category_image'  => getSingleMedia($this, 'category_image',null),
            'amenity_name'    => $selected_amenity,
            'created_at'      => $this->created_at,
            'updated_at'      => $this->updated_at,
        ];
    }
}
