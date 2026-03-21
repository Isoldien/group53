<?php

namespace App\Events;

use App\Models\AdminMessage;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

    public AdminMessage $admin_message;
    public function __construct(AdminMessage $message)
    {
        //
        $this->admin_message = $message;
    }
    public function broadcastWith():array
    {
        return [

            'message' => $this->admin_message->message,
            'title' => $this->admin_message->title
        ];
    }
    public function broadcastAs():string
    {
        return 'message_event';
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('stock-channel'),
        ];
    }
}
