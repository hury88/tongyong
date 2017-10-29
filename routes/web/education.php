<?php

Route::group(['prefix'=>'education'],function(){
    Route::get('', [ 'uses' => 'EducationController@study_index']);
    Route::get('index', [ 'uses' => 'EducationController@study_index']);
    Route::get('study', ['as' => 'study', 'uses' => 'EducationController@study_index']);
    Route::get('tour', ['as' => 'tour', 'uses' => 'EducationController@tour_index']);
    Route::get('camp', ['as' => 'camp', 'uses' => 'EducationController@camp_index']);
    Route::get('joint', ['as' => 'joint', 'uses' => 'EducationController@joint_index']);

    Route::get('study/introduce', ['as' => 'study/introduce', 'uses' => 'EducationController@study_introduce']);
    Route::get('study/notice', ['as' => 'study/notice', 'uses' => 'EducationController@newslist']);
    Route::get('study/guide', ['as' => 'study/guide', 'uses' => 'EducationController@study_guide']);
    Route::get('study/news', ['as' => 'study/news', 'uses' => 'EducationController@newslist']);
});



