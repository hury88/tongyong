<?php

Route::group(['prefix'=>'job'],function(){
    Route::get('', [ 'uses' => 'TrainingController@joblist']);
    Route::get('index', [ 'uses' => 'TrainingController@joblist']);
    Route::get('high-level', [ 'uses' => 'TrainingController@joblist']);
    Route::get('enterprise', [ 'uses' => 'TrainingController@joblist']);
    Route::get('campus', [ 'uses' => 'TrainingController@joblist']);
    Route::get('resume', [ 'uses' => 'TrainingController@resumelist']);
    Route::get('school', [ 'uses' => 'TrainingController@newslist']);

    Route::get('high-level/{id}', ['uses' => 'TrainingController@show']);
    Route::get('enterprise/{id}', ['uses' => 'TrainingController@show']);
    Route::get('campus/{id}', [ 'uses' => 'TrainingController@show']);
    Route::get('school/{id}', [ 'uses' => 'TrainingController@view']);
});





