<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Frontend\HomeController@index');

//----reservations------
Route::get('/reservations', 'Frontend\ReservationsController@index')->name('reservations');
Route::post('/reservations/store', 'Frontend\ReservationsController@store')->name('reservations.store');

Route::get('/category/{id}/{slug}', 'Frontend\HomeController@category_wise')->name('category.wise');
Route::get('/sub-category/{id}/{slug}', 'Frontend\HomeController@sub_category_wise')->name('sub_category.wise');
//----Cart-----
Route::get('/cart', 'Frontend\CartController@show_cart')->name('cart');
Route::post('/add-to/cart', 'Frontend\CartController@add')->name('add.cart');
Route::get('/destroy/cart/item/{rowId}', 'Frontend\CartController@destroy')->name('destroy.cart.item');
//------Menus------
Route::get('/menu', 'Frontend\HomeController@menu')->name('menu');
Route::post('/menu/item', 'Frontend\HomeController@menu_item')->name('menu.item');
Route::post('/menu/item/cart', 'Frontend\HomeController@menu_item_cart')->name('menu.item.cart');

//-----Place Order----
Route::post('apply/coupon', 'Frontend\CartController@apply_coupon')->name('apply.coupon');
Route::post('place/order', 'Frontend\CartController@place_order')->name('place.order');

//----User Auth-------

Route::match(['get', 'post'],'/user/register', 'Frontend\AuthController@register')->name('user.register');
Route::match(['get', 'post'],'/user/login', 'Frontend\AuthController@login')->name('user.login');

//Auth::routes();

Route::group(['middleware' => 'auth', 'namespace' =>'Frontend'], function (){
    Route::get('/account', 'AccountController@index')->name('account');

    Route::get('/order/details/{id}', 'AccountController@order_details')->name('order.details');

    Route::post('user/logout', 'AuthController@logout')->name('user.logout');
    //----Thanks Page----
    Route::get('/thanks', 'CartController@thanks')->name('thanks');
    //-----Stript--------
    Route::get('/stripe', 'StripeController@index');
    Route::post('/stripe/payment', 'StripeController@payment')->name('stripe.payment');

});



//Route::get('/home', 'HomeController@index')->name('home');

//-------------Admin panel------
Route::match(['get', 'post'], '/admin', 'Backend\AdminController@login')->name('admin');

Route::group(['prefix'=>'admin', 'as'=>'admin.', 'namespace' => 'Backend', 'middleware' => 'admin'], function (){
    Route::post('logout', 'AdminController@logout')->name('logout');
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');

    //Profile Routes Are Here----
    Route::prefix('profile')->group(function (){
        Route::get('/view', 'ProfileController@show')->name('view.profile');
        Route::get('/edit/{id}', 'ProfileController@edit')->name('edit.profile');
        Route::post('/update/{id}', 'ProfileController@update')->name('update.profile');
        Route::get('/change/password', 'ProfileController@show_password')->name('change.password');
        Route::post('/update_password', 'ProfileController@update_password')->name('update.password');
    });

    //Category Routes-----
    Route::prefix('category')->group(function (){
        Route::get('/view', 'CategoryController@show')->name('view.category');
        Route::get('/add', 'CategoryController@add')->name('add.category');
        Route::post('/store', 'CategoryController@store')->name('store.category');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('edit.category');
        Route::post('/update/{id}', 'CategoryController@update')->name('update.category');
        Route::post('/destroy/{id}', 'CategoryController@destroy')->name('destroy.category');
        Route::get('/status', 'CategoryController@status')->name('status.category');
    });

    //SubCategory Routes-----
    Route::group(['prefix'=>'subcategory'], function (){
        Route::get('/view', 'SubCategoryController@show')->name('view.subcategory');
        Route::get('/add', 'SubCategoryController@add')->name('add.subcategory');
        Route::post('/store', 'SubCategoryController@store')->name('store.subcategory');
        Route::get('/edit/{id}', 'SubCategoryController@edit')->name('edit.subcategory');
        Route::post('/update/{id}', 'SubCategoryController@update')->name('update.subcategory');
        Route::post('/destroy/{id}', 'SubCategoryController@destroy')->name('destroy.subcategory');
        Route::get('/status', 'SubCategoryController@status')->name('status.subcategory');
    });

    //Product Routes-----
    Route::prefix('product')->group(function (){
        Route::get('/view', 'ProductController@show')->name('view.product');
        Route::get('/add', 'ProductController@add')->name('add.product');
        //-------Get SubCategory----------
        Route::get('/get-subcategory', 'ProductController@get_subcategory')->name('get_subcategory.product');
        Route::post('/store', 'ProductController@store')->name('store.product');
        Route::get('/edit/{id}', 'ProductController@edit')->name('edit.product');
        Route::post('/update/{id}', 'ProductController@update')->name('update.product');
        Route::post('/destroy/{id}', 'ProductController@destroy')->name('destroy.product');
        Route::get('/status', 'ProductController@status')->name('status.product');
    });

    //Reservation Routes-----
    Route::prefix('reservation')->group(function (){
        Route::get('/view', 'ReservationController@show')->name('view.reservation');
        Route::get('/details', 'ReservationController@details')->name('details.reservation');
        Route::post('/status', 'ReservationController@status')->name('status.reservation');
    });

    //Coupon Routes-----
    Route::group(['prefix'=>'coupon'], function (){
        Route::get('/view', 'CouponController@show')->name('view.coupon');
        Route::get('/add', 'CouponController@add')->name('add.coupon');
        Route::post('/store', 'CouponController@store')->name('store.coupon');
        Route::post('/destroy/{id}', 'CouponController@destroy')->name('destroy.coupon');
        Route::get('/status', 'CouponController@status')->name('status.coupon');
    });

    //Slider Routes-----
    Route::group(['prefix'=>'slider'], function (){
        Route::get('/view', 'SliderController@show')->name('view.slider');
        Route::get('/edit/{id}', 'SliderController@edit')->name('edit.slider');
        Route::post('/update/{id}', 'SliderController@update')->name('update.slider');
    });

    //Logo & Slider Routes-----
    Route::group(['prefix'=>'logo'], function (){
        Route::get('/view', 'SliderController@show_logo')->name('view.logo');
        Route::get('/edit/{id}', 'SliderController@edit_logo')->name('edit.logo');
        Route::post('/update/{id}', 'SliderController@update_logo')->name('update.logo');
    });

    //SetMenu Routes-----
    Route::prefix('setmenu')->group(function (){
        Route::get('/view', 'SetMenuController@show')->name('view.setmenu');
        Route::post('/store', 'SetMenuController@store')->name('store.setmenu');
        Route::get('/details/{id}', 'SetMenuController@details')->name('details.setmenu');
        Route::post('/destroy/{id}', 'SetMenuController@destroy')->name('destroy.setmenu');
        //---SetMenu category
        Route::post('/store/category', 'SetMenuController@store_category')->name('store.setmenu.category');
        Route::post('/destroy/category/{id}', 'SetMenuController@destroy_category')->name('destroy.setmenu.category');
        //---SetMenu category Product
        Route::post('/store/product', 'SetMenuController@store_setmenu_product')->name('store.setmenu.product');
        Route::get('/view/product/{setmenucategory_id}', 'SetMenuController@view_setmenu_product')->name('view.setmenu.product');
        Route::post('/destroy/product/{id}', 'SetMenuController@destroy_setmenu_product')->name('destroy.setmenu.product');
    });

    Route::prefix('settings')->group(function (){
        //---Order Time---
        Route::prefix('order-time')->group(function (){
            Route::get('/view', 'SettingController@show_order_time')->name('show.order.time');
            Route::post('/store', 'SettingController@store_order_time')->name('store.order.time');
            Route::post('/destroy/{id}', 'SettingController@destroy_order_time')->name('destroy.order.time');
            Route::get('/status', 'SettingController@status_order_time')->name('status.order.time');
        });

        //---Payment Setting---
        Route::prefix('payment')->group(function (){
            Route::get('/view', 'SettingController@show_payment_setting')->name('show.payment.setting');
            Route::get('/status', 'SettingController@status_payment_setting')->name('status.payment.setting');
        });

        //---Shipping Charges---
        Route::prefix('shipping')->group(function (){
            Route::get('/charges/view','SettingController@shipping_charges')->name('view.shipping.charges');
            Route::get('/charges/edit/{id}','SettingController@shipping_charges_edit')->name('edit.shipping.charges');
            Route::post('/charges/update/{id}','SettingController@shipping_charges_update')->name('update.shipping.charges');
        });

        //Min & Max Amount Routes-----
        Route::group(['prefix'=>'set-amount'], function (){
            Route::get('/view', 'SettingController@show_min_max')->name('view.min_max');
            Route::get('/edit/{id}', 'SettingController@edit_min_max')->name('edit.min_max');
            Route::post('/update/{id}', 'SettingController@update_min_max')->name('update.min_max');
        });

        //Website Setting Routes-----
        Route::group(['prefix'=>'website-setting'], function (){
            Route::get('/view', 'SettingController@show_website_setting')->name('view.website_setting');
            Route::post('/update/{id}', 'SettingController@update_website_setting')->name('update.website_setting');
        });

    });


    //---Order Module---
    Route::prefix('order')->group(function (){
        Route::get('/view','OrderController@show')->name('view.order');
        Route::get('/details/{id}','OrderController@details')->name('order.details');
        Route::post('/order/status/{id}','OrderController@status')->name('order.status');
        Route::get('/order/print/{id}','OrderController@print')->name('order.print');

    });



});
