<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $usertype = request()->cookie('usertype');
        $account_id = request()->cookie('userid');


        if (!$usertype) {
            return $next($request);
        }

        switch ($usertype) {
            case 'client':
                return redirect('/client');
                break;
            case 'incharge':
                return redirect('/incharge');
                break;
            case 'admin':
                return redirect('/admin');
                break;
            default:
                break;
        }
    }
}
