<?php 

namespace App\V1\Interfaces;

use App\Http\Requests\V1\UserLoginRequest;

interface AuthInterface {
    public function userLogin(UserLoginRequest $request);
}