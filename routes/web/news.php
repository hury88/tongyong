<?php

Route::group(['prefix'=>'news'],function(){
    Route::get('', [ 'uses' => 'NewsController@newslist']);
    Route::get('index', [ 'uses' => 'NewsController@newslist']);
    Route::get('company', ['as' => 'company', 'uses' => 'NewsController@newslist']);
    Route::get('education', ['as' => 'education', 'uses' => 'NewsController@newslist']);
    Route::get('industry', ['as' => 'industry', 'uses' => 'NewsController@newslist']);
    Route::get('recent', ['as' => 'recent', 'uses' => 'NewsController@newslist']);
    Route::get('seach', ['as' => 'seach', 'uses' => 'NewsController@seachlist']);

    Route::get('company/{id}', [ 'as'=>'company','uses' => 'NewsController@show']);
    Route::get('education/{id}', [ 'as'=>'education','uses' => 'NewsController@show']);
    Route::get('industry/{id}', [ 'as'=>'industry','uses' => 'NewsController@show']);
    Route::get('recent/{id}', [ 'as'=>'recent','uses' => 'NewsController@show']);


});





