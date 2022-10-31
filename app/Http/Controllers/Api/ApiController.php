<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function apiResponse($data, $message = null, $code = 200)
    {
        $response=[
            'data' => $data,
            'message'=>$message,
            'code'=>$code
        ];
        return response()->json($response);
    }
}

class ResultType
{
    const Success = 1;
    const Information = 2;
    const Warning = 3;
    const Error = 4;
}