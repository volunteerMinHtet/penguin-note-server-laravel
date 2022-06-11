<?php

namespace App\Services\V1;

use App\Models\User;

class AuthService
{
    public function issueToken($deviceName, User $user)
    {
        $token = $user->createToken($deviceName ?? $user->name ?? 'New Account')->plainTextToken;
        return $token;
    }
}
