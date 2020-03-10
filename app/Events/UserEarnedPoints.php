<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserEarnedPoints
{
    use Dispatchable, SerializesModels;

    public $user;
    public $points;
    public $totalPoints;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $points, $totalPoints)
    {
        $this->user = $user;
        $this->points = $points;
        $this->totalPoints = $totalPoints;
    }
}
