<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\V1\UserService;
use App\Traits\V1\ResponseApi;

class UserController extends Controller
{
    use ResponseApi;

    public function detail(UserService $userService)
    {
        try {
            return $this->successResponse("Successfully retrieved user's detail", $userService->getUserDetail());
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), null, $e->getCode());
        }
    }
}
