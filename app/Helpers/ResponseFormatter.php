<?php

namespace App\Helpers;

use Illuminate\Http\Response;

/**
 * Format response.
 */
class ResponseFormatter
{
    /**
     * API Response
     *
     * @var array
     */
    protected static $response = [

        'code' => Response::HTTP_OK,
        'status' => 'success',
        'message' => '',
        'data' => null,
    ];

    /**
     * Give success response.
     */
    public static function success($data = null, $message = null)
    {
        self::$response['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['code']);
    }

    /**
     * Give error response.
     */
    public static function error($message = '', $code = Response::HTTP_BAD_REQUEST)
    {
        self::$response['status'] = 'error';
        self::$response['code'] = $code;
        self::$response['message'] = $message;

        return response()->json(self::$response, self::$response['code']);
    }

    /**
     * Give success response, with additional info.
     */
    public static function successWithInfo(Array $data = null, $message = null)
    {
        self::$response['message'] = $message;
        $newResponse = array_merge(self::$response, $data);

        return response()->json($newResponse, self::$response['code']);
    }
}