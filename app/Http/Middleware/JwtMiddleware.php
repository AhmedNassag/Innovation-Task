<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        try
        {
            $user = JWTAuth::parseToken()->authenticate();
        }
        
        catch (\Exception $e)
        {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException)
            {
                return response()->json(['status' => 'Token Is Invalid']);
            }

            else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException)
            {
                return response()->json(['status' => 'Token Is Expired']);
            }

            else
            {
                return response()->json(['status' => 'Token Not found']);
            }

        }
        return $next($request);
    }

}