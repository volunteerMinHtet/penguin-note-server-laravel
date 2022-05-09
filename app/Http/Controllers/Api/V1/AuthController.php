<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\UserLoginRequest;
use App\Http\Services\V1\AuthService;
use App\Traits\V1\ResponseApi;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ResponseApi;

    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(UserLoginRequest $request)
    {
        if (Auth::attempt(['user_name' => $request->user_name, 'password' => $request->password])) {
            $token = $this->authService->issueToken($request, Auth::user());
            return $this->successResponse('Successfully logged in', $token);
        }
        return $this->errorResponse('Provided username or password is not correct', null, 400);
    }
}
