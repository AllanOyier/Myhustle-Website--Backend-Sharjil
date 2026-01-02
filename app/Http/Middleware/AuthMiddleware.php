<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie('access_token');

        if (!$token) {
            $authHeader = $request->header('Authorization');
            if ($authHeader && str_starts_with($authHeader, 'Bearer ')) {
                $token = substr($authHeader, 7);
            }
        }

        if (!$token) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized: No token provided'
            ], 401);
        }
        $accessToken = PersonalAccessToken::findToken($token);

        if (!$accessToken) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthenticated: token invalid',
            ], 401);
        }

        $user = $accessToken->tokenable;

        // Attach user to request (standard)
        $request->setUserResolver(fn() => $user);

        // Attach user_id separately if you want it directly
        $request->merge(['user_id' => $user->id]);

        return $next($request);
    }
}
