<?php

namespace App\Events;

use App\Models\User;

class EncryptUserPassword extends Event
{
    public $user;

    public $raw;

    /**
     * Create a new event instance.
     *
     * @param  string $raw The raw password before encrypted.
     * @param  User   $user
     * @return void
     */
    public function __construct($raw, User $user)
    {
        $this->raw = $raw;
        $this->user = $user;
    }
}
