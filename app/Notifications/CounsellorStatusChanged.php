<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CounsellorStatusChanged extends Notification
{
    use Queueable;
    public $status;
    public $code;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($status,$code)
    {
        $this->status = $status;
        $this->code = $code;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from('no-reply@tongletap.com', 'Tongle EAP Portal')
            ->subject('Counsellor Request Status Changed')
            ->greeting('Hello '. ucfirst($notifiable->name ?? 'Employee').',')
            ->line('Your counsellor request status for Ticket Code: '.$this->code.' has been changed to  ' . ucfirst($this->status) . '.' )
            ->action('View Request', url('/ticket'))
            ->line('Thank you for using our application!')
            ->salutation('Regards, Tongle Team');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
