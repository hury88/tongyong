<?php


#举报
Route::post('complaint', 'TongyongController@complaint')->name('jubao');
/*Route::get('img/{file?}', 'FileController@img')->where('file', '(.*)');

Route::get('logs', 'LogController@index');

Route::resource('log', 'LogController');
*/