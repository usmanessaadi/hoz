<?php

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

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

Route::get('/testClr', function () {
    // $prd = App\Product_Detail::color->whereIn('id',\App\Product_Detail::where(['door_id'=>1])->pluck('color_id'))
    $prd = App\Product_Detail::first()->getAllProductColor();
    return $prd;
});

//If user Auth
Route::middleware('auth')->group(function () {

    Route::group(['prefix' => 'account'], function () {

        Route::get('/', function () {

            return view('account.account');
        })->name('account');

        Route::get('/orders', 'AccountManagementController@myOrders')->name('account-orders');

        //saved Products routes
        Route::group(['prefix' => 'saved_products'], function () {

            Route::get('/', 'AccountManagementController@get_saved_products')->name('account-saved-product');
            Route::get('/filter', 'AccountManagementController@filter_saved_product')->name('filter-saved-product');

            Route::post('add/{id?}', 'AccountManagementController@add_to_savedProducts')->name('add_to_saved_product');
            Route::delete('remove/{id?}', 'AccountManagementController@remove_from_savedProducts')->name('remove_from_saved_product');
        });


        //End saved Products routes

        Route::get('/recently-seen', function () {

            return view('account.recently-seen-products');
        })->name('account-recently-seen-product');

        //Personal Info Routes
        Route::get('/personal-info', function () {

            return view('account.personal-info');
        })->name('account-personal-info');

        Route::post('/personal-info', 'AccountManagementController@update_personal_info')->name('update-personal-info');
        //End Personal Info Routes

        //Manage user addresses Routes
        Route::group(['prefix' => 'addresses'], function () {

            Route::get('/', function () {

                return view('account.address');
            })->name('account-addresses');

            Route::middleware('Check_if_address_owned_by_user')->group(function () {

                Route::put('/set/{id}/default', 'AccountManagementController@set_as_default_address')->name('set_default_address');
                Route::delete('/delete-address/{id}', 'AccountManagementController@delete_user_address')->name('delete_address');
            });

            Route::post('/add-new-address', 'AccountManagementController@add_new_user_address')->name('add_new_user_address');
        });
        //End Manage user addresses Routes

        //Change Password Route
        Route::get('/change-password', function () {
            return view('account.change-password');
        })->name('account-change-password');

        Route::post('/change-password', 'AccountManagementController@change_user_password')->name('account-change-password');
        //End Change Password Route

        Route::get('/communication-preferences', function () {

            return view('account.communication-preferences');
        })->name('account-communication-preferences');
    });


    //Auth user actions to product


});


//Help Me Choose
Route::group(['prefix' => 'HMC'], function () {

    Route::get('/', function () {
        return view('hmc');
    })->name('hmc');

    /*
     * if user choose Gates type
     * */
    Route::get('/getGatesDimensions', 'HelpMeChooseController@getGatesDimensions')->name('get-gates-dimensions');
    Route::get('/getGates', 'HelpMeChooseController@HMC_getGates');

    /*
    * if user choose Doors type
    * */
    Route::get('/getDoorsDimensions', 'HelpMeChooseController@getDoorsDimensions')->name('get-doors-dimensions');
    Route::get('/get-fire-rated-option', 'HelpMeChooseController@getFireRatedOption')->name('get-fire-rated-option');
    Route::get('/getDoors', 'HelpMeChooseController@HMC_getDoors')->name('hmc-get-doors');

    /*
     * if user choose Digital Locks type
    * */
    Route::group(['prefix' => 'D_L'], function () {

        Route::get('/DigitalLock_Types', 'HelpMeChooseController@getDigitalLock_Types')->name('get-digital-lock_Types');
        Route::get('/doorTypes', 'HelpMeChooseController@getDigitalLock_DoorsType')->name('get-dl-doors-type');
        Route::get('/lockTypes/{selected_doorType_id}', 'HelpMeChooseController@getDigitalLock_LocksType')->name('get-dl-locks-type');
        Route::get('/handleTypes/{selected_doorType_id}/{selected_lockType_id}', 'HelpMeChooseController@getDigitalLock_HandlesType')->name('get-dl-handles-type');
        Route::get('/unlockMethods/{selected_doorType_id}/{selected_lockType_id}/{selected_handleType_id}', 'HelpMeChooseController@getDigitalLock_UnlockMethods')->name('get-dl-unlock-methods-type');
    });
});


Route::group(['prefix' => 'order_sub'], function () {

    /*
     * if user choose Gates type
     * */
    Route::get('/makeOrder', 'OrderController@order');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home-page');

Route::get('/shop/{category?}', 'ProductController@shop')->name('shop');


Route::post('/addToCart/{id?}', 'ProductController@addToCart')->name('add-to-Cart');
Route::put('/plus_minus_cart', 'ProductController@plus_minus_cart')->name('plus_minus_cart');
Route::delete('/cleanCart/{id?}', 'ProductController@cleanCart')->name('cleanCart');
Route::get('cart', function () {
    return view('cart');
});


Route::get('product/{slug}', 'ProductController@getProduct')->name('view-product');

Route::get('search', 'SearchController@search')->name('search-filter');
Route::get('clear-filter/{fltertype?}', 'SearchController@clearFilter')->name('clear-filter');
/**routes for testing */
Route::get('search-view', function(){
    return view('testBlade.testsearch');
})->name('search-view');
/** END routes for testing */
Route::get('place-order', 'OrderController@place_order')->name('palce-order');


Route::get('/contact', function () {
    return 'contact page';
})->name('contact');


Route::group(['prefix' => 'admin'], function () {

    Route::get('/dashboard', 'AdminController@index')->name('admin-home');

    Route::group(['prefix' => 'product'], function () {

        Route::get('/manage-prd/{type}', 'AdminController@manageProducts')->name('manage-products');
        Route::any('/add/{type}', 'AdminController@addProduct')->name('add-product');
        Route::any('/details/{type}/{id}', 'AdminController@addProductDetails')->name('add-product-details');
        Route::any('/details-update/{id}', 'AdminController@updateProductDetails')->name('update-product-details');
        Route::any('/details-delete/{id}', 'AdminController@deleteProductDetail')->name('delete-product-details');
        Route::any('/edit/{type}/{id}', 'AdminController@editProduct')->name('edit-product');
        Route::any('/delete', 'AdminController@addProduct')->name('delete-product');
        Route::any('/delete-img/{path}/{product_id}/{main_img?}', 'AdminController@deleteFile')->name('delete-image');
    });

    Route::group(['prefix' => 'digital_locks'], function () {
        Route::any('/addType/{type}', 'AdminController@addDigitalType')->name('add-digital-locks-type');
        Route::any('/deleteType/{type}/{id}', 'AdminController@deleteDigitalType')->name('delete-digital-locks-type');
        Route::any('/updateType/{type}/{id}', 'AdminController@updateDigitalType')->name('update-digital-locks-type');
        // Route::any('/handles_type','AdminController@addHandleType')->name('add-handles-type');
        // Route::any('/locks_type','AdminController@addHandleType')->name('add-locks-type');
    });

    Route::group(['prefix' => 'orders'], function () {
        Route::any('/{status}', 'AdminController@manageOrders')->name('admin-manage-orders');
        Route::any('/order-status/{order}/{status}', 'AdminController@change_order_status')->name('change-order-status');
    });
});


Auth::routes();
