<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Validator;
use Session;
use YZM;
use Send;
use App\User;

class ForgotPasswordController extends Controller
{
    /**
     * @var bool [mobile or mail]
     */
    private $is_mobile = false, $is_mail = false;
    /**
     * @var array 验证规则
     */
    private $rules = [];
    /**
     * 验证的账号字段 [mobile or mail]
     */
    private $credentialsField = '';
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the recover password form.
     *
     * @return void
     */
    public function get_pwd1()
    {
        return view('auth.get_pwd1');
    }
    public function get_pwd2()
    {
        return $this->in(2) ? view('auth.get_pwd2') : redirect()->route('password.get1');
    }
    public function get_pwd3()
    {
        return $this->in(3) ? view('auth.get_pwd3') : redirect()->route('password.get2');
    }
    public function get_pwd4()
    {
        return $this->in(4) ? view('auth.get_pwd4') : redirect()->route('password.get3');
    }

    public function post_pwd1(Request $request)
    {
        $username = $request->{$this->getInputUsername()};
        $this->detection($username);
        $validator = Validator::make($request->all(), $this->rules);

        $errors = $validator->errors(); // 输出的错误，自己打印看下
        if ($validator->fails()) {
            return noticeResponseJson(412, '执行失败', $errors);
        }
        $yzm = new YZM('reset1');
        if ($yzm->legal($request->yzm)) {
            $yzm->pop();
            $this->to(2);
            $request->session()->put($this->getInputUsername(), $username);
            $request->session()->put('is_mobile', $this->is_mobile);
            $request->session()->put('is_mail', $this->is_mail);
            return handleResponseJson(200, '正在进入下一页', route('password.get2'));
        }
        return noticeResponseJson(303, '验证码校验失败.', '不匹配或已失效');

    }

    public function post_pwd2(Request $request)
    {
        if(!$request->session()->has( $this->getInputUsername() )) abort(404);

        $username = $request->session()->get($this->getInputUsername());
        $yzm = new YZM($username);
        if ($yzm->legal($request->yzm)) {
            $yzm->pop();
            $this->to(3);
            return handleResponseJson(200, '正在进入下一页', route('password.get3'));
        }
    }

    public function post_pwd3(Request $request)
    {
        if(!$request->session()->has( $this->getInputUsername() )) abort(404);
        $rules = [
            // 'origin' => 'required|between:6,20',
            'new' => 'required|between:6,20',
            'password2' => 'required|between:6,20|same:new',
        ];

        $username = $request->session()->get($this->getInputUsername());

        if ( $request->session()->get('is_mail', false) ) {
            $user = User::where('email', $username)->first();


        } elseif( $request->session()->get('is_mobile', false) ) {
            $user = User::where('telphone', $username)->first();

        } else {
            abort(404);
        }

        $new = $request->new;
        $hashedPassword = $user->password;

        $validator = Validator::make($request->all(), $rules);

        $validator->after(function ($validator) use ($hashedPassword, $new) {
            /*if ($origin == $new) {
                $validator->errors()->add('new', '旧密码与新密码相同');
            }*/
            if (\Hash::check($new, $hashedPassword)) {
                $validator->errors()->add('new', '旧密码与新密码相同');
            }
        });


        $errors = $validator->errors(); // 输出的错误，自己打印看下
        if ($validator->fails()) {
            return noticeResponseJson(412, '执行失败', $errors);
        }

        $user->password = bcrypt($new);

        if ($user->save()) {
            $this->to(4);
            return handleResponseJson(200, '密码修改成功! ', route('password.get4'));
        } else {
            return handleResponseJson(412, '密码修改失败,请稍后再试');
        }






    }

    public function post_pwd4()
    {
    }

    // 第二步验证 发送验证码
    public function yzm(Request $request)
    {
        if(!$request->session()->has( $this->getInputUsername() )) abort(404);

        $username = $request->session()->get($this->getInputUsername());

        $yzm = new YZM($username);
        $code = $yzm->push();
        if ( $request->session()->get('is_mail', false) ) {

            $name = '用户';

            // 调取验证码短信模板
            $response_view = view('notify.yzm.email', compact('code', 'name'))->render();

            if (Send::mail($request->email, '验证你的电子邮件地址', $response_view)) {

                return handleResponseJson(2011, '邮件验证码发送成功, 请注意查收.');
            }

            return handleResponseJson(412, '发送邮件失败, 请重试！');
        } elseif( $request->session()->get('is_mobile', false) ) {
            // 调取验证码短信模板
            $response_view = view('notify.yzm.sms', compact('code'))->render();

            if (Send::sms($request->telphone, $response_view)) {

                if ( $yzm->debug() ) {
                    return handleResponseJson(2011, $response_view);
                } else {
                    return handleResponseJson(2011, '短信验证码发送成功, 请注意查收.');
                }
            } else {
                return handleResponseJson(412, '发送验证码失败, 请重试!');
            }
        }

        abort(404);
    }

    /**
     * 检测 是邮箱还是手机号
     * @return bool
     */
    private function detection($val)
    {
        $rules = [];
        if ($val == '') {
            $rules['username'] = 'required';
        } elseif (strpos($val, '@')) {
            $this->setCredentialsField('email');
            $rules['username'] = 'required|email|exists:users,email';
            $this->is_mail = true;
        } else {
            $this->setCredentialsField('telphone');
            $rules['username'] = 'required|regex:/^1[34578][0-9]{9}$/|exists:users,telphone';
            $this->is_mobile = true;
        }
        $rules['yzm'] = 'required';
        $this->rules = $rules;
    }

    private function checkUsername()
    {
        return 'username';
    }

    private function getInputUsername()
    {
        return 'username';
    }

    /**
     * 获取默认凭据字段
     * @return string
     */
    private function getCredentialsField()
    {
        return $this->credentialsField;
    }

    /**
     * 修改默认凭据字段
     */
    private function setCredentialsField($newField)
    {
        $this->credentialsField = $newField;
    }

    private function in($step)
    {
        return $step == $this->where();
    }
    private function notIn($step)
    {
        return $step != $this->where();
    }

    private function where()
    {
        return Session::get('in_pwd', 1);
    }

    private function to($step)
    {
        Session::flash('in_pwd', $step);
    }
}
