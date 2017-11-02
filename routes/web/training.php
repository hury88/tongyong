<?php

Route::group(['prefix'=>'training'],function(){
    Route::get('', [ 'uses' => 'TrainingController@index']);
    Route::get('index', [ 'uses' => 'TrainingController@index']);
    Route::get('skill', [ 'uses' => 'TrainingController@newslist']);
    Route::get('enterprise', [ 'uses' => 'TrainingController@newslist']);
    Route::get('online', [ 'uses' => 'TrainingController@newslist']);
    Route::get('business', [ 'uses' => 'TrainingController@userlist']);
    Route::get('skill/{id}', ['uses' => 'TrainingController@show']);
    Route::get('enterprise/{id}', ['uses' => 'TrainingController@show']);
    Route::get('online/{id}', [ 'uses' => 'TrainingController@show']);
    Route::get('business/{id}', [ 'uses' => 'TrainingController@view']);
});





