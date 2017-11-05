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

    Route::get('password', 'PersonController@password');
    Route::post('xgmm', 'PersonController@xgmm');
    Route::get('telphone', 'PersonController@telphone');
    Route::get('getyzm/{type}', 'PersonController@getyzm');
    Route::get('email', 'PersonController@email');
    Route::post('xgtel', 'PersonController@xgtel');


    Route::get('certified', 'PersonController@certified');
    Route::post('smrz', 'PersonController@smrz');
    Route::get('message', 'PersonController@message');
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




    Route::get('order', 'PersonController@order');
    Route::get('order/view/{id}', 'PersonController@orderview');
    Route::get('order/sqtk/{id}', 'PersonController@ordersqtk');
    Route::get('order/pay/{id}', 'PersonController@orderpay');
    Route::get('order/paysucc/{id}', 'PersonController@orderpaysucc');



    Route::get('order/bmbzypx/{type?}', 'PersonController@orderbmbzypx');
    Route::get('order/bmbzyzs/{type?}', 'PersonController@orderbmbzyzs');
    Route::get('order/bmbgjjy/{type?}', 'PersonController@orderbmbgjjy');
    Route::get('order/bmbview/{id}', 'PersonController@orderbmbview');









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

    Route::get('myFreeProducts', ['uses' => 'FreeProductsController@myFreeProducts', 'as' => 'freeproducts.my_free_products']);
});