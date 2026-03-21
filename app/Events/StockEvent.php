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

class StockEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public int $no_of_low_stock;
    public int $no_out_of_stock;


    public function __construct(int $no_of_low_stock, int $no_out_of_stock)
    {
        //
        $this->no_of_low_stock = $no_of_low_stock;
        $this->no_out_of_stock = $no_out_of_stock;

    }
    public function broadcastWith():array
    {
        return [
            'no_of_low_stock' => $this->no_of_low_stock,
            'no_out_of_stock' => $this->no_out_of_stock,

        ];
    }
    public function broadcastAs():string
    {
        return 'stock_event';
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('stock-channel'),
        ];
    }
}
