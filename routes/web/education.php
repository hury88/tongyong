<?php

Route::group(['prefix'=>'education'],function(){
    //二级主页面
    Route::get('', [ 'uses' => 'EducationController@study_index']);
    Route::get('index', [ 'uses' => 'EducationController@study_index']);
    Route::get('study', ['as' => 'study', 'uses' => 'EducationController@study_index']);
    Route::get('tour', ['as' => 'tour', 'uses' => 'EducationController@tour_index']);
    Route::get('camp', ['as' => 'camp', 'uses' => 'EducationController@camp_index']);
    Route::get('joint', ['as' => 'joint', 'uses' => 'EducationController@joint_index']);
    //国际留学
    Route::get('study/introduce', [ 'uses' => 'EducationController@study_introduce']);
    Route::get('study/notice', [ 'uses' => 'EducationController@newslist']);
    Route::get('study/guide', ['uses' => 'EducationController@newslist']);
    Route::get('study/news', ['uses' => 'EducationController@newslist']);
    Route::get('study/news/{id}', [ 'uses' => 'EducationController@view']);
    Route::get('study/introduce/{id}', [ 'uses' => 'EducationController@introduce_view']);
    Route::get('study/notice/{id}', [ 'uses' => 'EducationController@view']);
    Route::get('study/guide/{id}', [ 'uses' => 'EducationController@view']);
    //国际游学
    Route::get('tour/international', [ 'uses' => 'EducationController@tourlist']);
    Route::get('tour/route', [ 'uses' => 'EducationController@tourlist']);
    Route::get('tour/answer', ['uses' => 'EducationController@newslist']);
    Route::get('tour/international/{id}', [ 'uses' => 'EducationController@show']);
    Route::get('tour/route/{id}', [ 'uses' => 'EducationController@show']);
    Route::get('tour/answer/{id}', [ 'uses' => 'EducationController@view']);
    //国际夏令营
    Route::get('camp/hot', [ 'uses' => 'EducationController@tourlist']);
    Route::get('camp/characteristic', [ 'uses' => 'EducationController@tourlist']);
    Route::get('camp/marvellous', ['uses' => 'EducationController@newslist']);
    Route::get('camp/dynamic', ['uses' => 'EducationController@newslist']);
    Route::get('camp/hot/{id}', [ 'uses' => 'EducationController@show']);
    Route::get('camp/characteristic/{id}', [ 'uses' => 'EducationController@show']);
    Route::get('camp/marvellous/{id}', [ 'uses' => 'EducationController@view']);
    Route::get('camp/dynamic/{id}', [ 'uses' => 'EducationController@view']);
    //国际夏令营
    Route::get('joint/international', [ 'uses' => 'EducationController@study_introduce']);
    Route::get('joint/domestic', [ 'uses' => 'EducationController@study_introduce']);
    Route::get('joint/notice', ['uses' => 'EducationController@newslist']);
    Route::get('joint/international/{id}', [ 'uses' => 'EducationController@introduce_view']);
    Route::get('joint/domestic/{id}', [ 'uses' => 'EducationController@introduce_view']);
    Route::get('joint/notice/{id}', [ 'uses' => 'EducationController@view']);
});



