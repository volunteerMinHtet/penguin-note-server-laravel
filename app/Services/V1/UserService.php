<?php

namespace App\Services\V1;

use App\Http\Requests\V1\UserRegisterRequest;
use App\Interfaces\V1\UserServiceInterface;
use App\Models\User;

class UserService implements UserServiceInterface
{
    public function create(UserRegisterRequest $request): User
    {
        $user = new User;
        $user->name = $request->name;
        $user->user_name = $request->user_name;
        $user->password = bcrypt($request->password);
        $user->save();

        $user->token = $user->createToken($request->name)->plainTextToken;

        return $user;
    }
}
