<?php

namespace App\Services;

use App\Repositories\UserRepository;

class User
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }
}
