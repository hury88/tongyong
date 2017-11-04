<?php

namespace app\Http\Middleware;

use App\Http\Controllers\OrdersController;
use Closure;

class Authenticate
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
        dd($request);
        if (\Auth::check()) {
            if (\Auth::user()->isPerson()) {
                return $next($request);
            } else {
                return returnNotPerson('您的身份不符,只有个人会员才可执行此操作');
            }
        } else {
            // return redirect(url()->previous())
        }
        return returnNotPerson('请先登录才可报名');
    }

    private function returnNotPerson($errors)
    {
        if (Request()->isJson()) {
            return handleResponseJson(203, $errors, route('login'));
        } else {
            return redirect()->back()->withInput()->withErrors($errors);
        }

    }
}
