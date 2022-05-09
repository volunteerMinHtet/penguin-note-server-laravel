<?php

namespace App\Http\Services\V1;

use App\Http\Requests\V1\UserRegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function createNewUser(UserRegisterRequest $request): string
    {
        $user = new User();
        $user->name = $request->name;
        $user->user_name = $request->user_name;
        $user->password = bcrypt($request->password);
        $user->save();

        return $user->createToken($request->name)->plainTextToken;
    }

    public function getUserDetail(): User
    {
        return Auth::user();
    }
}
