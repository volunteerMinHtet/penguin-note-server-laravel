<?php

namespace App\Traits\V1;

trait ResponseApi
{
    public function coreResponse($message, $data = null, $statusCode, $isSuccess = true)
    {
        if ($isSuccess) {
            return response()->json([
                'message' => $message,
                'data' => $data
            ], $statusCode);
        } else {
            return response()->json([
                'message' => $message,
                'error' => $data
            ], $statusCode);
        }
    }

    public function successResponse(string $message, $data = null, $statusCode = 200)
    {
        return $this->coreResponse($message, $data, $statusCode, true);
    }

    public function errorResponse(string $message, $error = null, $statusCode = 500)
    {
        return $this->coreResponse($message, $error, $statusCode, false);
    }
}
