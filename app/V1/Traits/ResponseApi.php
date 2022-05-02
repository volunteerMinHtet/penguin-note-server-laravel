<?php

namespace App\V1\Traits;

trait ResponseAPI
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

    public function successResponse($message, $data = null, $statusCode = 200)
    {
        return $this->coreResponse($message, $data, $statusCode, true);
    }

    public function errorResponse($message, $error = null, $statusCode = 500)
    {
        return $this->coreResponse($message, $error, $statusCode, false);
    }
}
