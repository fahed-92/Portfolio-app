<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class VisitorCountUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $visitorCount;

    public function __construct($visitorCount)
    {
        $this->visitorCount = $visitorCount;
    }

    public function broadcastOn()
    {
        return new Channel('visitor-count');
    }

    public function broadcastWith()
    {
        return [
            'visitorCount' => $this->visitorCount,
        ];
    }
}
