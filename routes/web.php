<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
| @author  Gustavo Ocanto <gustavoocanto@gmail.com>
|
*/

Auth::routes();

// 首页
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('help', [ 'uses' => 'NewsController@helplist']);
Route::get('weixin', function(){
    return view('weixin');
});
Route::get('yzm', function(){
    return view('yzm');
});
Route::get('editor', function(){
    return view('partial/editor');
});
Route::group(['prefix' => 'home'], function () {
    Route::get('/', 'HomeController@index');
});
// 图片处理
Route::get('img/{file?}', 'FileController@img')->where('file', '(.*)');
//个人中心
require __DIR__.'/web/users.php';
//会员中心
require __DIR__.'/web/business.php';
//用户注册
 require __DIR__.'/web/reg.php';

//国际教育
 require __DIR__.'/web/education.php';
//职业证书
require __DIR__.'/web/certificate.php';
//职业培训
require __DIR__.'/web/training.php';
//职业招聘
require __DIR__.'/web/job.php';
//Wpanel Routes
// require __DIR__.'/web/wpanel.php';

//products lists
// require __DIR__.'/web/products.php';

//wish lists
// require __DIR__.'/web/wish_lists.php';

//orders lists
require __DIR__.'/web/orders.php';

//关于我们
require __DIR__.'/web/about.php';
//新闻动态
require __DIR__.'/web/news.php';
//utilities
// require __DIR__.'/web/utilities.php';
