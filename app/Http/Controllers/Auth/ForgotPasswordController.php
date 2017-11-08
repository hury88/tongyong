<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
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
}
