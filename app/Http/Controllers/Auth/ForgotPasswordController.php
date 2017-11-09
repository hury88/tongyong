<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

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

    public function get_pwd2(Request $request)
    {
        $this->detection($request->{$this->getInputUsername()});

        $this->validate_pro($request, $this->rules());

        $this->createUser($request->all());

        $this->sendRegistrationEmail($request->all());

        auth()->login($user);

        return redirect($this->redirectTo);

        $rules = $this->rules($request->{$this->getInputUsername()});
        $this->validate($request, $rules);

        if (auth()->attempt($this->credentials($request), true)) {
            return redirect()->intended($this->redirectPath());
        }

        $yzm = new YZM($id);
        if ($yzm->legal($request->yzm)) {
            return $this->$callback($request, $yzm);
        }

        $yzm = new YZM($telphone);
        if ($yzm->legal($request->yzm)) {
            $yzm->pop();
            $user->telphone = $telphone;
            if ($user->save()) {
                return handleResponseJson(200, '手机号修改成功.', '/person');
            }
            return handleResponseJson(412, '手机号修改失败,请稍后再试.');
        }
        return noticeResponseJson(303, '验证码校验失败.', '不匹配或已失效');


        return redirect('/login')
            ->withInput($request->only($this->getInputUsername(), 'r'))
            ->withErrors([
                $this->getInputUsername() => $this->getFailedLoginMessage(),
            ]);
        return view('auth.get_pwd2');
    }

    public function get_pwd3()
    {
        return view('auth.get_pwd3');
    }

    public function get_pwd4()
    {
        return view('auth.get_pwd4');
    }


    /**
     * 检测 是邮箱还是手机号
     * @return bool
     */
    private function detection($val)
    {
        if (strpos('@', $val)) {
            $this->setCredentialsField('email');
            $this->rules = [
            ];
            $this->is_mail = true;
        } else {
            $this->setCredentialsField('telphone');
            $this->rules = [
            ];
            $this->is_mobile = true;
        }
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

    private function rules($rule_fields = [])
    {
        $rules = [
            'telphone' => 'required|regex:/^1[34578][0-9]{9}$/|exists:users,telphone',
            'email' => 'required|email|exists:users,email',
        ];
        return;
    }
}
