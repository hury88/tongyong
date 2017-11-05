<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/user';

    /**
     * 默认凭据字段
     * @var string
     */
    protected $credentialsField = 'telphone';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Process the user login.
     *
     * @param Request $request
     *
     * @return void
     */
    public function login(Request $request)
    {
        $rules = $this->rules($request->{$this->getInputUsername()});
        $this->validate($request, $rules);

//        if (auth()->attempt($this->credentials($request), $request->has('remember'))) {
        if (auth()->attempt($this->credentials($request), true)) {
//            return redirect($this->redirectTo);
            return redirect()->intended($this->redirectPath());
        }

        return redirect('/login')
            ->withInput($request->only($this->getInputUsername()))
            ->withErrors([
                $this->getInputUsername() => $this->getFailedLoginMessage(),
            ]);
    }

    /**
     * Handle the user login.
     *
     * @param Request $request
     *
     * @return void
     */
    protected function handle(Request $request, $rules)
    {

    }

    /**
     * Return the login validation rules.
     *
     * @return array
     */
    protected function rules($val)
    {
        if (strpos($val, '@')) {
            // 邮箱登陆
            $rules = [
                $this->getInputUsername() => 'required|email',
            ];
            $this->setCredentialsField('email');

        } else {
            // 手机登陆
            $rules = [
                $this->getInputUsername() => 'required|regex:/^1[34578][0-9]{9}$/',
            ];
        }

        $rules['password'] = 'required';

        return $rules;
    }

    /**
     * Return the user credentials.
     *
     * @param Request $request
     *
     * @return array
     */
    protected function credentials(Request $request)
    {
        return [
            $this->getCredentialsField() => $request->{$this->getInputUsername()},
            'password' => $request->password,
        ];
    }

    /**
     * Returns the login message error.
     *
     * @return string
     */
    public function getFailedLoginMessage()
    {
        return trans('user.credentials_do_not_match_our_records');
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

    /**
     * 获取账户字段名
     * @return string
     */
    private function getInputUsername()
    {
        return 'username';
    }

    public function redirectTo()
    {
        if ($r = Request()->get('r')) {
            return base64_decode($r);
        }
        return $this->redirectTo;
    }
}
