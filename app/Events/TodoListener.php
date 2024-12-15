<?php

namespace App\Events;

use App\Models\Todo;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class TodoListener implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id;

    public function __construct(protected Todo $todo)
    {
        $this->id = $todo->id;
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('todo'),
        ];
    }
}