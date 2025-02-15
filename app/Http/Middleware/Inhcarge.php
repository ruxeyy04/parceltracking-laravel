<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class Inhcarge
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
        if ($account_id === null || $usertype === null) {
            return redirect('/');
        }

        if ($usertype == 'incharge') {
            return $next($request);
        }

        switch ($usertype) {
            case 'client':
                return redirect('/client');
                break;
            case 'incharge':
                return redirect('/incharge');
                break;
            default:
                Cookie::queue(Cookie::forget('userid'));
                Cookie::queue(Cookie::forget('usertype'));
                return redirect('/');
                break;
        }
    }
}
