<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Http\Controllers\Controller;

use App\Http\Resources\NotificationResource;

class NotificationController extends Controller
{
    public function getList(Request $request)
    {
        $user = auth()->user();

        $user->last_notification_seen = now();
        $user->save();

        $type = isset($request->type) ? $request->type : null;
        if($type == "markas_read"){
            if(count($user->unreadNotifications) > 0 ) {
                $user->unreadNotifications->markAsRead();
            }
        }
        
        $page = isset($request->page) ? $request->page : 1;
        $limit = isset($request->limit) ? $request->limit : config('constant.PER_PAGE_LIMIT');

        $notifications = $user->Notifications->sortByDesc('created_at')->forPage($page,$limit);

        $all_unread_count = isset($user->unreadNotifications) ? $user->unreadNotifications->count() : 0;

        $items = NotificationResource::collection($notifications);
        
        $response = [
            'notification_data' => $items,
            'all_unread_count' => $all_unread_count,
        ];

        return json_custom_response($response);
    }
     public function getNotificationDetail(Request $request)
    {
        $id = request('id');
        $notification = Notification::where('id', $id)->first();

        if(empty($notification)){
            $message = __('message.not_found_entry',['name' =>__('message.notification')]);
            return json_message_response($message,400);   
        }

        $notification_detail = new NotificationResource($notification);

        $user = auth()->user();
        if(count($user->unreadNotifications) > 0 ) {
            $user->unreadNotifications->where('id', $id)->markAsRead();
        }

        $all_unread_count = isset($user->unreadNotifications) ? $user->unreadNotifications->count() : 0;

        $response = [
            'data' => $notification_detail,
            'all_unread_count' => $all_unread_count,
        ];
        
        return json_custom_response($response);
    }
}
