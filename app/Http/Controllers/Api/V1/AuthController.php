<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\UserLoginRequest;
use App\Http\Requests\V1\UserRegisterRequest;
use App\Services\V1\UserService;
use App\Traits\V1\ResponseApi;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ResponseApi;

    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(UserLoginRequest $request)
    {
        if (Auth::attempt(['user_name' => $request->user_name, 'password' => $request->password])) {
            $token = auth()->user->createToken($request->device_name || auth()->user->name);
            return $this->successResponse('Successfully logged in', $token->plainTextToken);
        }
        return $this->errorResponse('Provided username or password is not correct', null, 400);
    }

    public function createAccount(UserRegisterRequest $request)
    {
        $user = $this->userService->create($request);

        return $this->successResponse('Successfully registered', $user, 201);
    }
}
