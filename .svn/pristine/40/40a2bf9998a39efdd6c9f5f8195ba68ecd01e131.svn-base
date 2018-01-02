<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\enquiryreg;
class EnquiryAssigned extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $enquiryreg;
    protected $eventData;
    public function __construct(enquiryreg $enquiryreg,$eventData)
    {
        //
        $this->enquiryreg=$enquiryreg;
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message'=>'New task Enquiry Handling<br/>(Assigned To:'.$this->enquiryreg->assignedto.",Assigned by:".$this->enquiryreg->assignedby.')',
            'auth_user'=>auth('admin')->user()->username,
            'send_notification_user'=>[$this->enquiryreg->assignedto],
            'url'=>$this->eventData['url']
        ];
    }
}
