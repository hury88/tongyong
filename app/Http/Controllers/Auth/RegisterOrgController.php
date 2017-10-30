<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Business;
use App\User;
use Illuminate\Http\Request;
use Validator;
use YZM;

class RegisterOrgController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    // use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/user';

    /**
     * 用户的角色类型 个人1, 企业2
     * @var int
     */
    protected $role = 2;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('App\Http\Middleware\VerifyOrgRegister');
    }

    /**
     * Process the user registration.
     *
     * @return void
     */
    protected function register(Request $request)
    {
        // 'App\Http\Middleware\VerifyPersonRegister' 注册的全局变量
        list($callback, $id) = $GLOBALS['middleware_request'];

        $yzm = new YZM($id);
        if ($yzm->legal($request->yzm)) {
//            dd($yzm->_YZM());
            return $this->$callback($request, $yzm);
        }

        return noticeResponseJson(303, '验证码校验失败.', '不匹配或已失效');
    }

    /**
     * 企业会员 手机注册
     */
    protected function telphoneRegister($request, YZM $yzm)
    {
        $user = $this->createUser('telphone', $request->all());

        auth()->login($user);

        $yzm->pop();

        return handleResponseJson(200, '注册成功!', $this->redirectTo);
    }

    /**
     * 企业会员邮箱注册
     */
    protected function emailRegister($request, YZM $yzm)
    {
        $user = $this->createUser('email', $request->all());

        auth()->login($user);

        $yzm->pop();

        return handleResponseJson(200, '注册成功!', $this->redirectTo);

    }

    /**
     * Create a new user.
     *
     * @param array $data
     *
     * @return User
     */
    protected function createUser($registerStyle, array $data)
    {
        $user = User::create([
            $registerStyle => $data[$registerStyle],
            'member_name' => $data['org'],
            'password' => bcrypt($data['password']),
            'role' => $this->role,
        ]);

        Business::create([
            'user_id'    => $user->id,
            'business_name'  => $data['org'],
            'location' => $data['location'],
            'contact' => $data['contact'],
        ]);

        return $user;
    }

    /**
     * Send the registration email.
     *
     * @param array $data
     *
     * @return void
     */
    protected function sendRegistrationEmail(array $data)
    {
        $title = trans('user.emails.verification_account.subject');

        $name = $data['first_name'] . ' ' . $data['last_name'];

        \Mail::queue('emails.accountVerification', ['data' => $data, 'title' => $title, 'name' => $name], function ($message) use ($data) {
            $message->to($data['email'])->subject(trans('user.emails.verification_account.subject'));
        });

        session()->put('message', trans('user.signUp_message', ['_name' => $name]));

        session()->save();
    }

}
