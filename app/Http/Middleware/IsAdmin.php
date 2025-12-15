<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::has('loginId')) {
            $user = User::where('id', '=', Session::get('loginId'))->first();
            if ($user->admin) {
                return $next($request);
            }
            else {
                abort(403);
            }
        }
        return $next($request);
    }
}
