<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\UserRegisterRequest;
use App\Http\Resources\UserRecource;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function store(UserRegisterRequest $request, AuthService $service)
    {

        $result = $service->register($request->validated());


        return response()
            ->json([new UserRecource($result['user']), 'token' => $result['token']])
            ->cookie(
                'access_token',  // Cookie name
                $result['token'],          // Token value
                60 * 24 * 7,         // Expire in minutes (7 days)
                '/',              // Path
                null,      // domain = null
                true,            // Secure true for dev HTTPS
                true,             // HttpOnly
                false,            // Raw
                'None'            // SameSite=None for cross-port
            );
    }
    public function login(LoginRequest $request, AuthService $service)
    {
        $result = $service->login($request->validated());

        return response()
            ->json(new UserRecource($result['user']))
            ->cookie(
                'access_token',  // Cookie name
                $result['token'],          // Token value
                60 * 24 * 7,         // Expire in minutes (7 days)
                '/',              // Path
                null,      // domain = null
                true,            // Secure true for dev HTTPS
                true,             // HttpOnly
                false,            // Raw
                'None'            // SameSite=None for cross-port
            );
    }

    public function getUser(Request $request , AuthService $service):UserRecource
    {

        $user = $service->getUser($request->user_id);

        return new UserRecource($user);
    }




    public function destroy(): never
    {
        abort(404);
    }
}
