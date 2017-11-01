<?php

Route::group(['prefix'=>'training'],function(){
    Route::get('', [ 'uses' => 'TrainingController@index']);
    Route::get('index', [ 'uses' => 'TrainingController@index']);
    Route::get('skill', [ 'uses' => 'TrainingController@newslist']);
    Route::get('enterprise', [ 'uses' => 'TrainingController@newslist']);
    Route::get('online', [ 'uses' => 'TrainingController@newslist']);
    Route::get('skill/{id}', [ 'as'=>'company','uses' => 'TrainingController@show']);
    Route::get('enterprise/{id}', [ 'as'=>'education','uses' => 'TrainingController@show']);
    Route::get('online/{id}', [ 'uses' => 'TrainingController@show']);
});





