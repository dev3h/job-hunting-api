<?php 

namespace App\Helpers;

class ResponseHelper
{
    /**
     * Generate a JSON response for a successful request.
     *
     * @param mixed $data
     * @param string $message
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public static function success($data, string $message = 'Success', int $status = 200)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    /**
     * Generate a JSON response for a failed request.
     *
     * @param string $message
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public static function error(string $message = 'Error', $error = null, int $status = 500)
    {
        return response()->json([
            'status' => $status,
            'error' => $error,
            'message' => $message,
        ], $status);
    }
}