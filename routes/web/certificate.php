<?php

Route::group(['prefix'=>'certificate'],function(){
    //二级主页面
    Route::get('', [ 'uses' => 'CertificateController@qualifications_index']);
    Route::get('index', [ 'uses' => 'CertificateController@qualifications_index']);
    Route::get('qualifications', ['uses' => 'CertificateController@qualifications_index']);
    Route::get('upgraded', ['uses' => 'CertificateController@upgraded_index']);
    Route::get('graduate', ['uses' => 'CertificateController@graduate_index']);
    //职业资格信息
    Route::get('qualifications/manage', [ 'uses' => 'CertificateController@manage_index']);
    Route::get('qualifications/notice', [ 'uses' => 'CertificateController@newslist']);
    Route::get('qualifications/notice/{id}', [ 'uses' => 'CertificateController@view']);
    Route::get('qualifications/manage/{id}', [ 'uses' => 'CertificateController@show']);
    //专升本信息
    Route::get('upgraded/major', [ 'uses' => 'CertificateController@tourlist']);
    Route::get('upgraded/school', [ 'uses' => 'CertificateController@tourlist']);
    Route::get('upgraded/consultation', ['uses' => 'CertificateController@newslist']);
    Route::get('upgraded/problem', ['uses' => 'CertificateController@newslist']);
    Route::get('upgraded/major/{id}', [ 'uses' => 'CertificateController@show']);
    Route::get('upgraded/school/{id}', [ 'uses' => 'CertificateController@show']);
    Route::get('upgraded/consultation/{id}', [ 'uses' => 'CertificateController@view']);
    Route::get('upgraded/problem/{id}', [ 'uses' => 'CertificateController@view']);
    //考研信息
    Route::get('graduate/coach', [ 'uses' => 'CertificateController@study_introduce']);
    Route::get('graduate/school', [ 'uses' => 'CertificateController@study_introduce']);
    Route::get('graduate/consultation', ['uses' => 'CertificateController@newslist']);
    Route::get('graduate/problem', ['uses' => 'CertificateController@newslist']);
    Route::get('graduate/coach/{id}', [ 'uses' => 'CertificateController@introduce_view']);
    Route::get('graduate/school/{id}', [ 'uses' => 'CertificateController@introduce_view']);
    Route::get('graduate/consultation/{id}', [ 'uses' => 'CertificateController@view']);
    Route::get('graduate/problem/{id}', [ 'uses' => 'CertificateController@view']);
});



