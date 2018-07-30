<?php

namespace Educacional\Events;

use Educacional\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $user;
    /**
     * @var array
     */
    private $data;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param array $data
     */
    public function __construct(User $user, array $data)
    {
        $this->user = $user;
        $this->data = $data;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getData()
    {
        return $this->data;
    }
}
