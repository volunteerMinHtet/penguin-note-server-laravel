<?php

namespace App\Http\Services\V1;

use App\Http\Requests\V1\UserLoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function issueToken($request, User $user)
    {
        $token = $user->createToken($request->app_name || $request->user_name || 'New Token')->plainTextToken;
        return $token;
    }
}
