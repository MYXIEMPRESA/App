<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'id'                => $this->id,
            'first_name'        => $this->first_name,
            'last_name'         => $this->last_name,
            'email'             => $this->email,
            'address'           => $this->address,
            'contact_number'    => $this->contact_number,
            'profile_image'     => getSingleMedia($this, 'profile_image',null),
            'is_agent'          => $this->is_agent,
            'is_builder'        => $this->is_builder,
            'display_name'      => $this->display_name,
        ];
    }
}