<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;
use Illuminate\Support\Facades\Log;
use Berkayk\OneSignal\OneSignalClient;

class CommonNotification extends Notification
{
    use Queueable;
    public $type, $data, $subject, $notification_message;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($type, $data)
    {
        $this->type = $type;
        $this->data = $data;
        $this->subject = str_replace("_"," ",ucfirst($this->data['subject']));
        $this->notification_message = $this->data['message'] != '' ? $this->data['message'] : __('message.default_notification_body');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $notifications = []; 

        if( $notifiable->player_id != null ) {
            array_push($notifications, OneSignalChannel::class);
        }
       
        return $notifications;
    }

    public function toOneSignal($notifiable)
    {
        $msg = strip_tags($this->notification_message);
        if (!isset($msg) && $msg == ''){
            $msg = __('message.default_notification_body');
        }

        $type = 'new';
        if (isset($this->data['type']) && $this->data['type'] !== ''){
            $type = $this->data['type'];
        }

        if( $type == 'push_notification' && $this->data['image'] != null ) {

            return OneSignalMessage::create()
                ->setSubject($this->subject)
                ->setBody($msg) 
                ->setData('id',$this->data['id'])
                ->setData('type',$type)
                ->setIosAttachment($this->data['image'])
                ->setAndroidBigPicture($this->data['image']);
        } else {
        return OneSignalMessage::create()
            ->setSubject($this->subject)
            ->setBody($msg) 
            ->setData('id',$this->data['id'])
            ->setData('type',$type);
        }
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
