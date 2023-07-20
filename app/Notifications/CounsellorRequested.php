<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CounsellorRequested extends Notification
{
    use Queueable;
    public $ticket;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
            ->subject('New Counsellor Request')
            ->greeting('Hello Super Admin,')
            ->line('A new Counsellor has been requested with following ticket.')
            ->line('Ticket Code: ' . $this->ticket->ticket_code)
            ->line('Time Slot: ' . Carbon::parse($this->ticket->time_slot)->toDateTimeString())
            ->line('Subject: ' . $this->ticket->title)
            ->line('Priority: ' . ucfirst($this->ticket->priority))
            ->action('View Request', url('/ticket'));
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
