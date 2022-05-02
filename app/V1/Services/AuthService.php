<?php

namespace App\V1\Services;

use App\V1\Interfaces\AuthInterface;
use App\Http\Requests\V1\UserLoginRequest;

class AuthService implements AuthInterface {
    public function userLogin(UserLoginRequest $request) {
        return 'hello';
    }
}