<?php

namespace App\Services\V1;

use App\Http\Requests\V1\UserRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserService
{
    public function createNewUser(UserRegisterRequest $request): User
    {
        $user = new User();
        $user->id = Str::uuid()->toString();
        $user->name = $request->name;
        $user->user_name = $request->user_name;
        $user->password = bcrypt($request->password);
        $user->save();
        return $user;
    }

    public function getUserDetail(): User
    {
        return Auth::user();
    }
}
