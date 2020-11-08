<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class RedirectIfApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->status != User::IS_APPROVED) {
            abort('403', 'Looks Like Your Account has not been approved. Please contact the System Administrator');
        }
        return $next($request);
    }
}
