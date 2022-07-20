<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class penposStatus implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $penposStatus;
    public function __construct($penposStatus)
    {
        $this->penposStatus=$penposStatus;
    }

    public function broadcastOn()
    {
        return new Channel('penposChannel');
    }

    public function broadcastAs(){
        return 'penposStatus';
    }
}
