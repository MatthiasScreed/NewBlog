<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermissionsMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
//       $response = $next($request);
        if(!check_user_permissions($request)) {
           abort(403, "Forbidden access!");
       }
//dd($request);
        return $next($request);
    }
}
