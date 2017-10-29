<?php
/**
 * Created by PhpStorm.
 * User: hury
 * Date: 2017/10/28
 * Time: 15:26
 */

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::group(['prefix' => 'register'], function () {
    Route::get('', function () {
        return view('auth.register-person');
    });
    Route::get('person', function () {
        return view('auth.register-person');
    });
    Route::get('org', function () {
        return view('auth.register-org');
    });

    Route::post('', 'Auth\RegisterPersonController@register');
    Route::post('person', 'Auth\RegisterPersonController@register');
    Route::post('org', 'Auth\RegisterOrgController@register');
});


// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

use Illuminate\Http\Request;

// 注册页 验证码发送器
Route::group(['middleware' => 'personRegister'], function () {
    Route::post('/yzm/mobile', function (Request $request) {

        // 生成验证码
        $yzm = new YZM($request->telphone);
        $code = $yzm->push();

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
    });
    Route::post('/yzm/mail', function (Request $request) {

        // 生成验证码
        $yzm = new YZM($request->email);
        $code = $yzm->push();

        $name = $request->person;

        // 调取验证码短信模板
        $response_view = view('notify.yzm.email', compact('code', 'name'))->render();

        if (Send::mail($request->email, '验证你的电子邮件地址', $response_view)) {

            return handleResponseJson(2011, '邮件验证码发送成功, 请注意查收.');
        }

        return handleResponseJson(412, '发送邮件失败, 请重试！');

    });
});
