<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\UserLoginRequest;
use App\Http\Requests\V1\UserRegisterRequest;
use App\Services\V1\AuthService;
use App\Services\V1\UserService;
use App\Traits\V1\ResponseApi;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ResponseApi;

    public function login(UserLoginRequest $request, AuthService $authService)
    {
        try {
            if (Auth::attempt(['user_name' => $request->user_name, 'password' => $request->password])) {
                $token = $authService->issueToken($request?->device_name, Auth::user());
                return $this->successResponse('Successfully logged in', ['token' => $token]);
            }
            return $this->errorResponse('Provided username or password is not correct', null, 400);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), null, 500);
        }
    }

    public function register(UserRegisterRequest $request, UserService $userService, AuthService $authService)
    {
        try {
            $user = $userService->createNewUser($request);
            $token = $authService->issueToken($request?->device_name, $user);
            return $this->successResponse('Successfully created new account', ['token' => $token], 201);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), null, 500);
        }
    }

    public function checkToken()
    {
        if (auth('sanctum')->check()) {
            return $this->successResponse('Token is valid', null);
        }
        return $this->errorResponse('Token is invalid', null, 401);
    }
}
