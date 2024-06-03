<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\PushNotification;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $image = null;
        if( $this->data != null && $this->data['type'] == 'push_notification' ) {
            $pushnotification = PushNotification::where('id',$this->data['push_notification_id'])->first();
            $image = getMediaFileExit($pushnotification, 'notification_image') ? getSingleMedia($pushnotification, 'notification_image') : null;
        }
        return [
            'id'        => $this->id,
            'read_at'   => $this->read_at,
            'created_at'=> timeAgoFormate($this->created_at),
            'data'      => $this->data,
            'image'     => $image,
        ];
    }
}
