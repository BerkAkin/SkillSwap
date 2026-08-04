<?php

namespace App\Http\Middleware;

use App\Enums\RoleTypes;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if($request->user()->role !== RoleTypes::from($role)){
            return response()->json([
                'message'=> 'You have no permission to perform this operation',
            ],403);
        }
        return $next($request);
    }
}
