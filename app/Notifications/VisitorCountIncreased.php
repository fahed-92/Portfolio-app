<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VisitorCountIncreased extends Notification
{
    use Queueable;

    public $visitorCount;

    public function __construct($visitorCount)
    {
        $this->visitorCount = $visitorCount;
    }

    public function via($notifiable)
    {
        return ['mail', 'database', 'broadcast'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Visitor Count Increased')
            ->line('The number of visitors has increased.')
            ->line('Total visitors: ' . $this->visitorCount)
            ->action('View Dashboard', url('/admin'))
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'visitor_count' => $this->visitorCount,
            'message' => 'The number of visitors has increased to ' . $this->visitorCount
        ];
    }

    public function toBroadcast($notifiable)
    {
        return [
            'visitor_count' => $this->visitorCount,
            'message' => 'The number of visitors has increased to ' . $this->visitorCount
        ];
    }
}
