<?php

namespace App\Http\Controllers\Api;

use App\Constant\UserLevel;
use App\Models\User;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Psr\Http\Message\ServerRequestInterface;

class CustomAccessTokenController extends AccessTokenController
{
    /**
     * Hooks in before the AccessTokenController issues a token
     *
     *
     * @param  ServerRequestInterface $request
     * @return mixed
     */
    public function issueUserToken(ServerRequestInterface $request)
    {
        $requestBody = $request->getParsedBody();

        if($requestBody['grant_type'] == 'password') {

            $user = User::where('email', $requestBody['username'])->firstOrFail();

            if ($user->active == 0)
                return response()->json([
                    "error" => "invalid_grant",
                    "error_description" => "The user access is banned.",
                    "message" => "The user access is banned.",
                ], 400);

            if ($user->level != UserLevel::SURVEYOR && $user->level != UserLevel::ADMINISTRATOR)
                return response()->json([
                    "error" => "invalid_grant",
                    "error_description" => "The user access is denied.",
                    "message" => "The user access is denied.",
                ], 400);

        }

        return $this->issueToken($request);
    }
}
