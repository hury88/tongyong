<?php

Route::group(['prefix'=>'news'],function(){
    Route::get('', [ 'uses' => 'NewsController@newslist']);
    Route::get('index', [ 'uses' => 'NewsController@newslist']);
    Route::get('company', ['as' => 'company', 'uses' => 'NewsController@newslist']);
    Route::get('education', ['as' => 'education', 'uses' => 'NewsController@newslist']);
    Route::get('industry', ['as' => 'industry', 'uses' => 'NewsController@newslist']);
    Route::get('recent', ['as' => 'recent', 'uses' => 'NewsController@newslist']);


    Route::post('company/{id}', ['as' => 'company/{id}', 'uses' => 'NewsController@show']);
    Route::get('education/{id}', ['as' => 'education/{id}', 'uses' => 'NewsController@show']);
    Route::get('industry/{id}', ['as' => 'industry/{id}', 'uses' => 'NewsController@show']);
    Route::get('recent/{id}', ['as' => 'recent/{id}', 'uses' => 'NewsController@show']);
});
