<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Person;
use App\User;
// use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Validator;
use YZM;

class RegisterPersonController extends Controller
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
    protected $role = 1;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//         $this->middleware('guest');
        $this->middleware('App\Http\Middleware\VerifyPersonRegister');
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
     * 个人会员 手机注册
     */
    protected function telphoneRegister($request, YZM $yzm)
    {
        $user = $this->createUser('telphone', $request->all());

        auth()->login($user);

        $yzm->pop();

        return handleResponseJson(200, '注册成功!', $this->redirectPath());
    }

    /**
     * 个人会员 邮箱注册
     */
    protected function emailRegister($request, YZM $yzm)
    {
        $user = $this->createUser('email', $request->all());

        auth()->login($user);

        $yzm->pop();

        return handleResponseJson(200, '注册成功!', $this->redirectPath());

        /*$this->sendRegistrationEmail($request->all());
        return redirect($this->redirectTo);*/
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
            'member_name' => $data['person'],
            'password' => bcrypt($data['password']),
            'role' => $this->role,
        ]);

        Person::create([
            'user_id'    => $user->id,
            'real_name'  => $data['person'],
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
    /*\Mail::send('emails.contact', compact('thanks', 'title', 'name', 'email', 'message_'),
            function ($message) use ($request, $company, $from_address, $email) {
                $message->from($from_address, $company['website_name']);
                $message->to($email)
                        ->cc($from_address)
                        ->subject(trans('about.contact').' :: '.$company['website_name']);
            });
        public function registter(Request $request){
                $messages = [
                    'email.required' => '邮箱不能为空',
                    'password.required' => '密码不能为空',
                    'password2.required' => '确认密码不能为空',
                ];
                $validator = Validator::make($request->all(),[
                    'email' => ['bail','required', 'email', Rule::unique('member')->ignore($user->id)],
                    'password' => 'required',
                    'password2' => 'required',
                ],$messages);
                $errors = $validator->errors(); // 输出的错误，自己打印看下
                if ($validator->fails()){
                     return response()->json([
                         'success' => false,
                         'errors' =>  $errors
                     ]);
                }
            }
    */

   public function redirectPath()
   {
       if ($r = Request()->get('r')) {
           return base64_decode($r);
       }
       return $this->redirectTo;
   }

}
