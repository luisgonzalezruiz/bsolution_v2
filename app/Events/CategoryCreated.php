<?php

namespace App\Events;
use App\Models\Category;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Auth;

class CategoryCreated implements ShouldBroadcastNow  //ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $data = [];

    public $test = '';

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->data = [
            'category'=>$category,
            'current_user' => Auth::user()->id
        ];
       // $this->test = 'Esto esta bueno';
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
       // return new Channel('product.' . $this->data['product']->id);
       //return new Channel('category');
       //return  'category-channel';

        return new Channel('category-channel');
        //return new PrivateChannel('ticket.' . $this->ticket->user_id);

    }


    public function broadcastAs()
    {
        return 'category-event';
    }


}
