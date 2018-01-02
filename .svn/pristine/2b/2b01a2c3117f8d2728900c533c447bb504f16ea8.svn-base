<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\tcnrequest;

class TcnApplication extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $tcnrequest;
    protected $eventData;
    public function __construct(tcnrequest $tcnrequest,$eventData)
    {
        //
        $this->tcnrequest=$tcnrequest;
        $this->eventData=$eventData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            'message'=>$this->eventData['message'],
            'auth_user'=>$this->eventData['auth_user'],
            'send_notification_user'=>[$this->eventData['perminssions']],
            'url'=>$this->eventData['url']
        ];
    }
}
