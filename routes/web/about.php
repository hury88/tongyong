<?php

Route::group(['prefix'=>'about'],function(){
    Route::get('', ['as' => 'about', 'uses' => 'AboutController@show']);
    Route::get('index', ['as' => 'about', 'uses' => 'AboutController@show']);
    Route::get('contact', ['as' => 'contact', 'uses' => 'AboutController@show']);
    Route::get('culture', ['as' => 'culture', 'uses' => 'AboutController@show']);

    Route::get('problem', ['as' => 'problem', 'uses' => 'AboutController@problem']);

    Route::get('feedback', ['as' => 'feedback', 'uses' => 'AboutController@create']);
    Route::post('feedback', ['as' => 'feedback_store', 'uses' => 'AboutController@store']);

    Route::get('contract', ['as' => 'contract', 'uses' => 'AboutController@show']);
    Route::get('legal', ['as' => 'legal', 'uses' => 'AboutController@show']);
    Route::get('agreement', ['as' => 'agreement', 'uses' => 'AboutController@show']);
});
