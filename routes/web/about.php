<?php

Route::group(['prefix'=>'about'],function(){
    Route::get('', ['as' => 'about', 'uses' => 'AboutController@show']);
    Route::get('index', ['as' => 'about', 'uses' => 'AboutController@show']);
    Route::get('contact', ['as' => 'contact', 'uses' => 'AboutController@show']);
    Route::get('culture', ['as' => 'culture', 'uses' => 'AboutController@show']);
    Route::get('problem', ['as' => 'problem', 'uses' => 'AboutController@show']);
    Route::get('opinion', ['as' => 'opinion', 'uses' => 'AboutController@show']);
    Route::get('contract', ['as' => 'contract', 'uses' => 'AboutController@show']);
    Route::get('legal', ['as' => 'legal', 'uses' => 'AboutController@show']);
    Route::get('agreement', ['as' => 'agreement', 'uses' => 'AboutController@show']);
});

/*Route::get('contact', ['as' => 'contact', 'uses' => 'AboutController@create']);
Route::post('contact', ['as' => 'contact_store', 'uses' => 'AboutController@store']);
Route::get('about', ['as' => 'about', 'uses' => 'AboutController@about']);
Route::get('refunds', ['as' => 'refunds', 'uses' => 'AboutController@refunds']);
Route::get('privacy', ['as' => 'privacy', 'uses' => 'AboutController@privacy']);
Route::get('terms', ['as' => 'terms', 'uses' => 'AboutController@terms']);*/
