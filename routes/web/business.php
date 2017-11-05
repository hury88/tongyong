<?php
Route::group(['prefix' => 'business', 'roles' => [0,2], 'middleware' => ['auth', 'roles']], function () {

    // 左侧栏目
    foreach (array_keys(trans('business.menu')) as $index) {
        Route::get($index, ['as' => trans('business.route_prefiex').$index, 'uses' => "BusinessController@dispatch"]);
    }
    // 修改手机号 展示
    Route::get('telphone', ['as'=> 'get_b_telphone', 'BusinessController@dispatch']);
    // 修改邮箱号 展示
    Route::get('email', ['as'=> 'get_b_email', 'BusinessController@dispatch']);

    // 修改手机号
    Route::post('telphone/bind/new', ['as' => 'b_telphone', 'uses' => 'BusinessController@telphone']);
    Route::post('email/bind/new', ['as' => 'b_telphone', 'uses' => 'BusinessController@telphone']);
    // Route::get('dashboard', 'BusinessController@dashBoard');

    Route::get('json/qualificationid1/{id}', 'JsonController@qualificationid1');
    Route::get('json/qualificationid2/{id}', 'JsonController@qualificationid1');

    Route::get('/', ['as' => 'business', 'uses' => 'BusinessController@profile']);
    Route::get('/profile', ['as' => 'b_profile', 'uses' => 'BusinessController@profile']);
    // 系统消息
    Route::get('/notices', ['as' => 'b_notices', 'uses' => 'NoticesController@index']);


    //    删除操作
    Route::post('delete/{table}', ['as' => 'b_delte', 'uses' => 'BusinessController@delete']);
    Route::post('safe', ['as' => 'b_safe ', 'uses' => 'BusinessController@safe']);
    Route::post('certification', ['as' => 'b_certification ', 'uses' => 'BusinessController@certification']);
    // Route::post('config', ['as' => 'b_config ', 'uses' => 'BusinessController@config']);
    Route::post('config', ['as' => 'b_config ', 'uses' => 'BusinessController@config']);

    //    更新添加操作
    Route::post('{table}/cu/{id}', 'BusinessController@with');
    Route::post('{table}/cu', 'BusinessController@with');





    // 招聘路由组
    Route::group(['prefix' => 'job'], function(){
        foreach (trans('business.menu.job.next') as $index => $tran) {
            Route::get($index, 'BusinessController@dispatch');
            Route::get($index.'/{action}/{id}', 'BusinessController@dispatch');
            Route::get($index.'/{action}', 'BusinessController@dispatch');
        }
    });
    // 简历路由组
    Route::group(['prefix' => 'resume'], function(){
        foreach (trans('business.menu.resume.next') as $index => $tran) {
            Route::get($index, 'BusinessController@dispatch');
            Route::get($index.'/{action}/{id}', 'BusinessController@dispatch');
            Route::get($index.'/{action}', 'BusinessController@dispatch');
        }
    });
    // 职业培训管理
    Route::group(['prefix' => 'training'], function(){
        foreach (trans('business.menu.training.next') as $index => $tran) {
            Route::get($index, 'BusinessController@dispatch');
            Route::get($index.'/{action}/{id}', 'BusinessController@dispatch');
            Route::get($index.'/{action}', 'BusinessController@dispatch');
            Route::post($index.'/cu/{id}', 'BusinessController@with');
            Route::post($index.'/cu', 'BusinessController@with');

        }
    });
    // 证书管理
    /*Route::group(['prefix' => 'certificate'], function(){
//        Route::get('', 'BusinessController@dispatch');
        Route::get('/{action}/{id}', 'BusinessController@dispatch');
        Route::get('/{action}', 'BusinessController@dispatch');
        foreach (trans('business.menu.certificate.next') as $index => $tran) {
            Route::get($index, 'BusinessController@dispatch');
            Route::get($index.'/{action}/{id}', 'BusinessController@dispatch');

        }
    });*/
    $newsCats = new \App\NewsCats();
    // 证书管理
    Route::group(['prefix' => 'certificate'], function() use($newsCats){
        foreach (trans('business.menu.certificate.next') as $index => $tran) {
            $then = $newsCats->getNavigation(['path'], $tran['ty'])->toArray();
                Route::get($index, 'BusinessController@dispatch');
            foreach ($then as $row) {
                Route::get($index.'/'.$row['path'], 'BusinessController@dispatch');
                Route::get($index.'/'.$row['path'].'/{action}/{id}', 'BusinessController@dispatch');
                Route::get($index.'/'.$row['path'].'/{action}', 'BusinessController@dispatch');
                Route::post($index.'/'.$row['path'].'/cu/{id}', 'BusinessController@with');
                Route::post($index.'/'.$row['path'].'/cu', 'BusinessController@with');
                // Route::get($index.'/{action}', 'BusinessController@dispatch');
            }
        }
    });


    // 国际教育
    Route::group(['prefix' => 'education'], function() use($newsCats){
        foreach (trans('business.menu.education.next') as $index => $tran) {
            $then = $newsCats->getNavigation(['path'], $tran['ty'])->toArray();
                Route::get($index, 'BusinessController@dispatch');
            foreach ($then as $row) {
                Route::get($index.'/'.$row['path'], 'BusinessController@dispatch');
                Route::get($index.'/'.$row['path'].'/{action}/{id}', 'BusinessController@dispatch');
                Route::get($index.'/'.$row['path'].'/{action}', 'BusinessController@dispatch');
                Route::post($index.'/'.$row['path'].'/cu/{id}', 'BusinessController@with');
                Route::post($index.'/'.$row['path'].'/cu', 'BusinessController@with');
                // Route::get($index.'/{action}', 'BusinessController@dispatch');
            }
        }
    });

});
