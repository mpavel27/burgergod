<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OrderDetails implements ShouldBroadcast
{
    use SerializesModels;

    public int $id; // id order
    public int $update; // tip update
    public string $date; // data

    public function __construct(int $id, int $update,string $date)
    {
        $this->id = $id;
        $this->update = $update;
        $this->date = $date;
    }

    public function broadcastOn(): Channel
    {
        return new Channel("orderDetailsChannel-{$this->id}");
    }
}
