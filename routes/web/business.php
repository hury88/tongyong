<?php
Route::group(['prefix' => 'business', 'roles' => [0,2], 'middleware' => ['auth', 'roles']], function () {
    Route::get('dashboard', 'BusinessController@dashBoard');

    Route::get('/', ['as' => 'business', 'uses' => 'BusinessController@profile']);

    // 左侧栏目
    foreach (array_keys(trans('business.menu')) as $index) {
        Route::get($index, ['as' => trans('business.route_prefiex').$index, 'uses' => "BusinessController@$index"]);
    }

    // 招聘路由组
    Route::group(['prefix' => 'job'], function(){
        foreach (trans('business.menu.job.next') as $index => $tran) {
            Route::get($index, 'BusinessController@job');
        }
    });
    // 简历路由组
    Route::group(['prefix' => 'resume'], function(){
        foreach (trans('business.menu.resume.next') as $index => $tran) {
            Route::get($index, 'BusinessController@resume');
        }
    });
    // 职业培训管理
    Route::group(['prefix' => 'training'], function(){
        foreach (trans('business.menu.training.next') as $index => $tran) {
            Route::get($index, 'BusinessController@training');
        }
    });



   /* Route::post('profile/save', 'UserController@saveProfile');

    Route::post('profile/disable', 'UserController@disableProfile');

    Route::post('profile/enable', 'UserController@activeProfile');

    Route::post('upload', 'UserController@upload');*/

    //Address
   /* Route::get('address/', 'AddressesController@index'); //list

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
