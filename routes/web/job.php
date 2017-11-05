<?php

Route::group(['prefix'=>'job'],function(){
    Route::get('', [ 'uses' => 'JobController@joblist']);
    Route::get('index', [ 'uses' => 'JobController@joblist']);
    Route::get('high-level', [ 'uses' => 'JobController@joblist']);
    Route::get('enterprise', [ 'uses' => 'JobController@joblist']);
    Route::get('campus', [ 'uses' => 'JobController@joblist']);
    Route::get('resume', [ 'uses' => 'JobController@resumelist']);
    Route::get('school', [ 'uses' => 'JobController@newslist']);

    Route::get('high-level/{id}', ['uses' => 'JobController@show']);
    Route::get('enterprise/{id}', ['uses' => 'JobController@show']);
    Route::get('campus/{id}', ['uses' => 'JobController@show']);
    Route::get('resume/{id}', [ 'uses' => 'JobController@resumeview']);
    Route::get('school/{id}', [ 'uses' => 'JobController@view']);
});





