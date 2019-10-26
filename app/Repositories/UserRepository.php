<?php

namespace App\Repositories;

use App\Repositories\Models\User;

class UserRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->model = new User();
    }
}
