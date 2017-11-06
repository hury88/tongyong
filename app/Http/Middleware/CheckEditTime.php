<?php

namespace App\Http\Middleware;

use Closure;
use Validator;

class CheckEditTime
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       $bind_at = \Auth::user()->bind_at;
       if ($bind_at > time()) {
           return handleResponseJson(412, '一个月内只可换更换一次绑定账号');
       }
       return $next($request);

    }
}
