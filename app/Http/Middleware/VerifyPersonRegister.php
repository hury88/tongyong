<?php

namespace App\Http\Middleware;

use Closure;
use Validator;

class VerifyPersonRegister
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


        $messages = [
            'person' => [
                'required' => '缺少真实姓名',
                'max:4' => '真实姓名至少4位字符',
                'max:20' => '真实姓名不能超过20位字符',
            ],
            'password' => [
                'required' => '缺少密码',
                'max:4' => '密码至少4位字符',
            ],
            'password2' => [
                'required' => '缺少确认密码',
                'max:4' => '确认密码至少4位字符',
            ],
        ];

        if ('telphone' == $request->get('mark')) {
            $rules[] = ['telphone' => 'require'];
//            return $this->telphoneRegister($request);
        } elseif ('email' == $request->get('mark')) {
//            return $this->emailRegister($request);
        } else {
            return handleResponseJson(203, '系统识别不到本次行为,请刷新页面后再试!');
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        $mark = $request->get('mark');


        $errors = $validator->errors(); // 输出的错误，自己打印看下
        if ($validator->fails()) {
            return noticeResponseJson(412, '意见反馈提交失败', $errors);
        }

        return null;
    }

    private function rules()
    {
        return [
            'person' => 'bail|required|max:20|min:3',
            'password' => 'required|min:6',
            'password2' => 'required|min:6',
            'protocal' => 'accepted',
            ['password', 'compare', 'compareAttribute' => 'password2', 'on' => 'register', 'message' => '密码不一致']
        ];
    }
}
