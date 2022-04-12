<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChangeDeliveryBoy
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public int $id; // id order
    public int $delivery_boy; // tip update

    public function __construct(int $id, int $delivery_boy)
    {
        $this->id = $id;
        $this->delivery_boy = $delivery_boy;
    }

    public function broadcastOn(): Channel
    {
        return new Channel("orderAssignDeliveryChannel-{$this->id}");
    }
}
