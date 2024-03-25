<?php

namespace App\Traits;

trait HttpResponses
{
    protected function success($data)
    {
        return response()->json([
            'status' => 'OK',
            'data' => $data,

        ], 200);
    }

    protected function error($data, $message)
    {
        return response()->json([
            'status' => 'Error',
            'message' => $message,
            'data' => $data,

        ], 400);
    }
    protected function unauthenticated($data)
    {
        return response()->json([
            'status' => 'User not authenticated',
            'data' => $data,

        ], 402);
    }
    protected function unauthorized($data)
    {
        return response()->json([
            'status' => 'User not authorized',
            'data' => $data,

        ], 403);
    }
    protected function notFound($data)
    {
        return response()->json([
            'status' => 'Not found',
            'data' => $data,

        ], 404);
    }
}