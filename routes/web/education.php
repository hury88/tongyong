<?php

Route::group(['prefix'=>'education'],function(){
    Route::get('', [ 'uses' => 'EducationController@study_index']);
    Route::get('index', [ 'uses' => 'EducationController@study_index']);
    Route::get('study', ['as' => 'study', 'uses' => 'EducationController@study_index']);
    Route::get('tour', ['as' => 'tour', 'uses' => 'EducationController@tour_index']);
    Route::get('camp', ['as' => 'camp', 'uses' => 'EducationController@camp_index']);
    Route::get('joint', ['as' => 'joint', 'uses' => 'EducationController@joint_index']);

    Route::get('study/introduce', [ 'uses' => 'EducationController@study_introduce']);
    Route::get('study/notice', [ 'uses' => 'EducationController@newslist']);
    Route::get('study/guide', ['uses' => 'EducationController@newslist']);
    Route::get('study/news', ['uses' => 'EducationController@newslist']);

    Route::get('study/news/{id}', [ 'uses' => 'EducationController@view']);
    Route::get('study/introduce/{id}', [ 'uses' => 'EducationController@introduce_view']);
    Route::get('study/notice/{id}', [ 'uses' => 'EducationController@view']);
    Route::get('study/guide/{id}', [ 'uses' => 'EducationController@view']);
});



