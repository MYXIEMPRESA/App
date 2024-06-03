<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'display_name'      => $this->display_name,
            'email'             => $this->email,
            'username'          => $this->username,
            'status'            => $this->status,
            'user_type'         => $this->user_type,
            'address'           => $this->address,
            'contact_number'    => $this->contact_number,
            'profile_image'     => getSingleMedia($this, 'profile_image',null),
            'login_type'        => $this->login_type,
            'latitude'          => $this->latitude,
            'longitude'         => $this->longitude,
            'uid'               => $this->uid,
            'player_id'         => $this->player_id,
            'timezone'          => $this->timezone,
            'is_agent'          => $this->is_agent,
            'is_builder'        => $this->is_builder,
            'last_notification_seen' => $this->last_notification_seen,
            'is_subscribe'      => $this->is_subscribe,
            'view_limit_count'  => $this->view_limit_count,
            'add_limit_count'   => $this->add_limit_count,
            'advertisement_limit' => $this->advertisement_limit,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,

        ];
    }
}
