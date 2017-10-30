<?php

namespace App\Http\Middleware;

use Closure;
use Validator;

class VerifyOrgRegister
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
//        dd($request->all());

        $mark = $request->get('mark');
        if ('telphone' == $mark) {
            // 手机注册
            $rules = $this->telRules();

        } elseif ('email' == $mark) {
            // 邮箱注册
//            dd($request->all());
            $rules = $this->mailRules();

        } else {
            return handleResponseJson(203, '系统识别不到本次行为,请刷新页面后再试!');
        }

        $validator = Validator::make($request->all(), $rules);

        $errors = $validator->errors(); // 输出的错误，自己打印看下
        if ($validator->fails()) {
            return noticeResponseJson(412, '执行失败', $errors);
        }

        # 记录处理结果 ['callback', 'id'] # id means email or telphone
        $GLOBALS['middleware_request'] = [$mark.'Register', $request->get($mark)];
        return $next($request);
    }

    /**
     * @return 手机注册验证规则|array
     */
    private function telRules()
    {
        return [
            'org' => 'bail|required|max:20|min:2',
            'location' => 'required',
            'contact' => 'required',
            'telphone' => 'required|regex:/^1[34578][0-9]{9}$/|unique:users',
            'password' => 'required|min:6',
            'password2' => 'required|same:password',
            'protocal' => 'accepted',
//            'yzm' => 'required',
        ];
    }

    /**
     * @return 邮箱注册验证规则|array
     */
    private function mailRules()
    {
        return [
            'org' => 'bail|required|max:20|min:2',
            'location' => 'required',
            'contact' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password2' => 'required|same:password',
            'protocal' => 'accepted',
//            'yzm' => 'required',
        ];
    }
}
