<?php

namespace App\Traits;

trait HttpResponses
{
    protected function success(array $data, string $message = null, int $code = 200)
    {
        return response()->json(
            [
            'status' => 'Request was sucessful.',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected function error(array $data, string $message = null, int $code)
    {
        return response()->json(
            [
            'status' => 'Error has occured.',
            'message' => $message,
            'data' => $data
        ]
        , $code);
    }
}
