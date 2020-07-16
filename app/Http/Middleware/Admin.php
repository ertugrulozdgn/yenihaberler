<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{

    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 'admin' && Auth::user()->status == 1) {

            return $next($request);

        } else {

            return redirect(route('admin.login'))->with('error','Erişim Yetkiniz Yok!');
        }

    }
}
