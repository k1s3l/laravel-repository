<?php

namespace Kisel\Laravel\Repository\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EntityApiFound
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $result;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(mixed $result)
    {
        $this->result = $result;
    }
}
