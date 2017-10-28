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
Route::group(['prefix' => 'register'], function(){
    Route::get('', function(){return view('auth.register-person'); });
    Route::get('person', function(){return view('auth.register-person'); });
    Route::get('org', function(){return view('auth.register-org'); });

    Route::post('', 'Auth\RegisterPersonController@register');
    Route::post('person', 'Auth\RegisterPersonController@register');
    Route::post('org', 'Auth\RegisterOrgController@register');
});

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');