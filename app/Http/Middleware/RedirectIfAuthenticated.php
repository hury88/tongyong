<?php

namespace app\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @param string|null              $guard
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if($request->method() == 'ajax') {
                return handleResponseJson(203, '系统检测到您已登录, 进入个人中心', '/user');
            } else {
                return redirect('/user');
            }
        }


        return $next($request);
    }
}
