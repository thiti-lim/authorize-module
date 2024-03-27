<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\Response;

trait HttpResponses
{
    protected function success($data)
    {
        return response()->json([
            'status' => 'OK',
            'data' => $data,

        ], Response::HTTP_OK);
    }

    protected function error($data, $message)
    {
        return response()->json([
            'status' => 'Error',
            'message' => $message,
            'data' => $data,

        ], Response::HTTP_BAD_REQUEST);
    }
    protected function unauthenticated($data)
    {
        return response()->json([
            'status' => 'User not authenticated',
            'data' => $data,

        ], Response::HTTP_UNAUTHORIZED);
    }
    protected function unauthorized($data)
    {
        return response()->json([
            'status' => 'User not authorized',
            'data' => $data,

        ], Response::HTTP_FORBIDDEN);
    }
    protected function notFound($data)
    {
        return response()->json([
            'status' => 'Not found',
            'data' => $data,

        ], RESPONSE::HTTP_NOT_FOUND);
    }
}