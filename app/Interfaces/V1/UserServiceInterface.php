<?php

namespace App\Interfaces\V1;

use App\Http\Requests\V1\UserRegisterRequest;
use App\Models\User;

interface UserServiceInterface
{
    public function create(UserRegisterRequest $request): User;
}
