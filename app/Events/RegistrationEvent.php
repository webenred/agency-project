<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class RegistrationEvent
{
    use SerializesModels;

    /**
     * The authenticated user.
     *
     * @var \Illuminate\Contracts\Auth\Authenticatable
     */
    public $user;

    /**
     * Create a new event instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
        
    }
}
