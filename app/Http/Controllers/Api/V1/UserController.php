<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\UserRegisterRequest;
use App\Http\Services\V1\UserService;
use App\Traits\V1\ResponseApi;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ResponseApi;

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(UserRegisterRequest $request)
    {
        $token = $this->userService->createNewUser($request);
        return $this->successResponse('Successfully created new account', $token, 201);
    }

    public function detail()
    {
        try {
            return $this->successResponse("Successfully retrieved user's detail", $this->userService->getUserDetail());
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), null, $e->getCode());
        }
    }
}
