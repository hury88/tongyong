<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Person;
use App\User;
// use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Validator;

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
    protected $redirectTo = '/';

    /**
     * 在构造函数中存储临时返回, 无则为null
     * @var string
     */
    private $return = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        $this->return = $this->middleware('App\Http\Middleware\VerifyPersonRegister');
    }

    /**
     * Process the user registration.
     *
     * @return void
     */
    protected function register(Request $request)
    {
        # 手机注册
        if (is_null($this->return)) {

        } elseif(is_array($this->return)) {

        } else {
            return $this->return;
        }
        /*$mark = $request->get('mark');
        if ('telphone' == $mark) {
            return $this->telphoneRegister($request);
        } elseif ('email' == $mark) {
            return $this->emailRegister($request);
        } else {
            return handleResponseJson(203, '系统识别不到本次行为,请刷新页面后再试!');
        }*/

    }

    /**
     * 个人会员 手机 注册
     */
    protected function telphoneRegister($request)
    {


        $message = $request->get('message');
        $contact = $request->get('contact');
        if (
        (new Message)->feedback([
            'phone' => $contact,
            'message' => $message,
        ])
        ) {
            return handleResponseJson(200, '感谢您的反馈^_^!');
        }
        return handleResponseJson(201, '反馈失败或刷新页面重试');
    }

    /**
     * 个人会员 手机 注册
     */
    protected function emailRegister($request)
    {
        $this->validate($request, $this->rules());

        $user = $this->createUser($request->all());

        $this->sendRegistrationEmail($request->all());

        auth()->login($user);

        return redirect($this->redirectTo);
    }

    /**
     * Return the registration validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'first_name' => 'required|max:20|min:3',
            'last_name' => 'required|max:20|min:3',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ];
    }

    protected function messages()
    {
        return [
            'first_name' => 'required|max:20|min:3',
            'last_name' => 'required|max:20|min:3',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ];
    }

    /**
     * Create a new user.
     *
     * @param array $data
     *
     * @return User
     */
    protected function createUser(array $data)
    {
        $user = User::create([
            'email' => $data['email'],
            'nickname' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => 'person',
        ]);

        Person::create([
            'user_id' => $user->id,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
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
}
