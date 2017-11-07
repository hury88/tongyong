<?php

Route::resource('typepreferences', 'TypePreferencesController');

//points push notifications
Route::get('getPoints', 'UserController@getPoints');

//notices
Route::get('user/notices/check/{id?}', 'NoticesController@check');

Route::get('user/notices/list/{num?}', 'NoticesController@index');

Route::get('user/notices/{type?}', 'NoticesController@push');

Route::resource('user/notices', 'NoticesController');


Route::get('user',['middleware' => ['auth', 'roles'],function(){
     if (request()->user()->isCompany()) {
         return redirect()->route('business');
     }
    return redirect()->route('person');
}]);



// 个人会员
Route::group(['prefix' => 'person', 'roles' => [0,1], 'middleware' => ['auth', 'roles']], function () {
    Route::get('dashboard', 'PersonController@dashBoard');

    Route::get('/', ['as' => 'person', 'uses' => 'PersonController@profile']);
    Route::get('/profile', ['as' => 'p_enroll', 'uses' => 'PersonController@profile']);

    Route::get('password', 'PersonController@password');
    Route::post('upload/headimg', ['as' => 'uploadheadimg', function(){
        $request = request();
        $person = auth()->user()->profile;
        $headimg = upload($request, 'headimg');
        if ($headimg) {
            $person->headimg = $headimg;
            if ($person->save()) {
                return handleResponseJson(201, '头像上传成功!');
            }
            return noticeResponseJson(412, '抱歉', '头像上传失败,请稍后再试');
        } else {
            return noticeResponseJson(412, '执行失败', '请先上传头像');
        }
    }]);

    Route::post('xgmm', 'PersonController@xgmm');
    Route::get('telphone', 'PersonController@telphone');
    Route::get('getyzm/{type}', 'PersonController@getyzm');
    Route::get('email', 'PersonController@email');
    Route::post('xgtel', 'PersonController@xgtel');

    Route::get('certified', 'PersonController@certified');
    Route::post('smrz', 'PersonController@smrz');
    Route::get('message', ['as' => 'p_notices', 'uses' => 'NoticesController@person']);
    Route::get('message/view/{id}', 'PersonController@viewmessage');


    Route::get('jianli', 'PersonController@jianli');
    Route::get('jianli/add', 'PersonController@jianliadd');
    Route::get('jianli/view/{id}', 'PersonController@jianliview');
    Route::get('jianli/toudi', 'PersonController@jianlitoudi');
    Route::get('jianli/msyq', 'PersonController@jianlimsyq');
    Route::get('jianli/msyqview/{id}', 'PersonController@jianlimsyqview');
    Route::get('jianli/down', 'PersonController@jianlidown');
    Route::get('jianli/wdsc', 'PersonController@jianliwdsc');

    Route::get('jianli/postadd/{id}', 'PersonController@jianlipostadd');
    Route::get('jianli/postadd2/{id}', 'PersonController@jianlipostadd2');
    Route::get('jianli/postadd3/{id}', 'PersonController@jianlipostadd3');
    Route::get('jianli/postadd4/{id}', 'PersonController@jianlipostadd4');
    Route::get('jianli/postadd5/{id}', 'PersonController@jianlipostadd5');
    Route::get('jianli/postadd6/{id}', 'PersonController@jianlipostadd6');
    Route::get('jianli/postadd7/{id}', 'PersonController@jianlipostadd7');
    Route::get('jianli/postadd8/{id}', 'PersonController@jianlipostadd8');
    Route::get('jianli/postadd9/{id}', 'PersonController@jianlipostadd9');
    Route::get('jianli/postadd10/{id}', 'PersonController@jianlipostadd10');


    Route::get('jianli/top/{id}', 'PersonController@jianlitop');
    Route::get('jianli/mr/{id}', 'PersonController@jianlimr');
    Route::get('jianli/del/{id}', 'PersonController@jianlidel');
    Route::get('jianli/edit/{id}', 'PersonController@jianliedit');
    //简历-新增时获取对应模板
    Route::get('jianli/mbxz/{type}', 'PersonController@jianlimbxz');
    Route::get('jianli/mbxg/{type}', 'PersonController@jianlimbxg');




    Route::get('order', ['as' => 'p_order', 'uses' => 'PersonController@order']);
    Route::get('order/view/{id}', ['as' => 'p_o_v', 'uses' => 'PersonController@orderview']);
    Route::get('order/sqtk/{id}', 'PersonController@ordersqtk');
    Route::get('order/pay/{id}', 'PersonController@orderpay');
    Route::get('order/paysucc/{id}', 'PersonController@orderpaysucc');



    Route::get('order/bmbzypx/{type?}', 'PersonController@orderbmbzypx');
    Route::get('order/bmbzyzs/{type?}', 'PersonController@orderbmbzyzs');
    Route::get('order/bmbgjjy/{type?}', 'PersonController@orderbmbgjjy');
    Route::get('order/bmbview/{id}', 'PersonController@orderbmbview');







    // 修改手机号
    Route::post('profile/telphone/bind/new', ['as' => 'p_telphone', 'uses' => 'PersonController@post_telphone']);
    // 修改邮箱号
    Route::post('profile/email/bind/new', ['as' => 'p_email', 'uses' => 'PersonController@post_email']);

    Route::group(['middleware' => function($request, Closure $next){
        $rules = [
            'telphone' => 'required|regex:/^1[34578][0-9]{9}$/|unique:users',
        ];
        $validator = Validator::make($request->all(), $rules);
        $errors = $validator->errors(); // 输出的错误，自己打印看下
        if ($validator->fails()) {
            return noticeResponseJson(412, '执行失败', $errors);
        }
        return $next($request);
    }], function () {
        Route::post('/telphone/yzm', ['as' => 'p_telphone_yzm',function (Request $request) {

            $telphone = request()->get('telphone');
            // 生成验证码
            $yzm = new YZM($telphone);
            $code = $yzm->push();

            // 调取验证码短信模板
            $response_view = view('notify.yzm.sms', compact('code'))->render();

            if (Send::sms($telphone, $response_view)) {

                if ( $yzm->debug() ) {
                    return handleResponseJson(2011, $response_view);
                } else {
                    return handleResponseJson(2011, '短信验证码发送成功, 请注意查收.');
                }
            } else {
                return handleResponseJson(412, '发送验证码失败, 请重试!');
            }
        }]);

    });
//    发送邮箱
    Route::group(['middleware' => function($request, Closure $next){
        $rules = [
            'email' => 'required|email|unique:users',
        ];
        $validator = Validator::make($request->all(), $rules);
        $errors = $validator->errors(); // 输出的错误，自己打印看下
        if ($validator->fails()) {
            return noticeResponseJson(412, '执行失败', $errors);
        }
        return $next($request);
    }], function () {
        Route::post('/mail/yzm', ['as' => 'p_email_yzm',function (Request $request) {

            $email = request()->get('email');
            // 生成验证码
            $yzm = new YZM($email);
            $code = $yzm->push();

            $name = request()->get('name');

            // 调取验证码短信模板
            $response_view = view('notify.yzm.email', compact('code', 'name'))->render();

            if (Send::mail($email, '验证你的电子邮件地址', $response_view)) {

                return handleResponseJson(2011, '邮件验证码发送成功, 请注意查收.');
            }

            return handleResponseJson(412, '发送邮件失败, 请重试！');
        }]);

    });

    /*

    Route::post('profile/save', 'PersonController@saveProfile');

    Route::post('profile/disable', 'PersonController@disableProfile');

    Route::post('profile/enable', 'PersonController@activeProfile');

    Route::post('upload', 'PersonController@upload');

    //Address
    Route::get('address/', 'AddressesController@index'); //list

    Route::post('address/default', 'AddressesController@setDefault'); //set default

    Route::get('address/create', 'AddressesController@create');  //create form

    Route::get('address/{id}/edit', 'AddressesController@edit'); //edit form

    Route::put('address/store', 'AddressesController@store'); //store

    Route::put('address/{id}', 'AddressesController@update'); //update

    Route::post('address/delete', 'AddressesController@destroy'); //delete

    //Store Cart

    Route::get('user/orders/updateQuantity/{orderId}/{orderDetailId}/{newValue}', ['uses' => 'OrdersController@updateQuantity', 'as' => 'orders.update_order_quantity']);

    Route::get('product/save/{product}', ['uses' => 'OrdersController@saveForLater', 'as' => 'orders.save_for_later']);

    Route::get('orders/moveFrom/{origin}/to/{destination}/{productId}', ['uses' => 'OrdersController@moveFromOrder', 'as' => 'orders.move_from_order']);

    Route::get('orders/addToOrder/{orderId}/{productId}', ['uses' => 'OrdersController@addToOrderById', 'as' => 'orders.add_to_order_by_id']);

    Route::get('orders/checkOut/', ['uses' => 'OrdersController@checkOut', 'as' => 'orders.check_out']);

    Route::get('orders/checkOut/address/{addressId}', ['uses' => 'OrdersController@checkOutResume', 'as' => 'orders.check_out_address']);

    Route::get('orders/placeOrder/{type}', ['uses' => 'OrdersController@placeOrder', 'as' => 'orders.place_order']);

    Route::get('orders', ['uses' => 'OrdersController@usersOrders', 'as' => 'orders.show_orders']);

    //filtered by dates
    Route::post('orders', ['uses' => 'OrdersController@usersOrders', 'as' => 'orders.show_orders']);

    Route::get('orders/cancel/{orderId}', ['uses' => 'OrdersController@cancel', 'as' => 'orders.cancel']);

    Route::get('orders/showSeller/{orderId}', ['uses' => 'OrdersController@showSellerOrder', 'as' => 'orders.show_seller_order']);

    Route::get('orders/show/{orderId}', ['uses' => 'OrdersController@showOrder', 'as' => 'orders.show_order']);

    Route::get('orders/rate/{orderId}', ['uses' => 'OrdersController@rateOrder', 'as' => 'orders.rate_order']);

    //Route used to login an user and send it back to the product show

    Route::get('logAndShow/{productId}', ['uses' => 'ProductsController@show', 'as' => 'products.log_and_show']);

    Route::get('orders/close/{order_id}', ['uses' => 'OrdersController@closeOrder', 'as' => 'orders.close']);

    Route::get('modalSeeKeysPurchased', ['uses' => 'VirtualProductOrdersController@modalSeeKeysPurchased', 'as' => 'VirtualProductOrders.modalSeeKeysPurchased']);

    Route::get('showKeyVirtualProductPurchased/{idProduct}/{idOrder}', ['uses' => 'VirtualProductOrdersController@showKeyVirtualProductPurchased', 'as' => 'VirtualProductOrders.showKeyVirtualProductPurchased']);

    Route::get('orders/comment/{order_id}', ['uses' => 'OrdersController@commentOrder', 'as' => 'orders.comment']);

    Route::post('orders/storeComment', ['uses' => 'OrdersController@storeComment', 'as' => 'orders.store_comment']);

    Route::get('orders/delete/{order_id}/{type}', ['uses' => 'OrdersController@destroy', 'as' => 'orders.delete']);

    //Rates
    Route::post('rates/seller', ['uses' => 'OrdersController@rateSeller', 'as' => 'orders.rate_seller']);

    Route::post('rates/product', ['uses' => 'OrdersController@rateProduct', 'as' => 'orders.rate_product']);

    //Freeproducts
    Route::put('freeproducts/subscribe/{id}', ['uses' => 'FreeProductsController@subscribe', 'as' => 'freeproducts.subscribe']);

    Route::get('myFreeProducts', ['uses' => 'FreeProductsController@myFreeProducts', 'as' => 'freeproducts.my_free_products']);*/
});