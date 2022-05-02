<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\UserLoginRequest;
use Illuminate\Http\Request;
use App\V1\Interfaces\AuthInterface;

class AuthController extends Controller
{
    protected AuthInterface $authService;

    public function __construct(AuthInterface $authService) {
        $this->authService = $authService;
    }

    public function login(UserLoginRequest $request)
    {
      return response($this->authService->userLogin($request));
    }
}
