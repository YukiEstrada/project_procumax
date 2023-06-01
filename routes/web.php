<?php

use App\Http\Controllers\AdminItemController;

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

// Route For Login
Route::get('/login', "LoginController@showLogin")->name('login_show');
Route::post('admin/login', "LoginController@login")->name('login_admin');
// route for logout
Route::get('admin/logout', "LoginController@logout")->name("logout_show");


Route::group(['middleware' => 'CekAdmin'], function () {
    // Route for user list
    Route::get('/admin/UserPage', "AdminItemController@index")->name('admin_user_page');
    // route to config the approval level
    Route::post('/admin/UserPage/config', "AdminItemController@levelconfig")->name('level_config');
    // Route for create user
    Route::post('/admin/UserCreate', "AdminItemController@submit")->name('admin_user_create_post');
    // route for update user
    Route::get('/admin/UserUpdate/{id}', "AdminItemController@updateuser")->name('admin_user_update_show');
    Route::post('/admin/UserUpdate/{id}', "AdminItemController@save")->name('admin_user_update_post');
    // route for delete user
    Route::get('/admin/UserDelete/{id}', "AdminItemController@deleteuser")->name('admin_user_delete_show');
    // route for restore user
    Route::get('/admin/UserRestore/{id}', "AdminItemController@restoreuser")->name('admin_user_restore_show');

    // route for dept list
    Route::get('/admin/DeptPage', "AdminItemController@dept")->name('admin_dept_show');
    // route for create dept
    Route::post('/admin/DeptCreate', "AdminItemController@deptcreate")->name('admin_dept_create_post');
    // route for update dept
    Route::get('/admin/DeptUpdate/{id}', "AdminItemController@updatedept")->name('admin_dept_update_show');
    Route::post('/admin/DeptUpdate/{id}', "AdminItemController@update")->name('admin_dept_update_post');
    // route for delete dept
    Route::get('/admin/DeptDelete/{id}', "AdminItemController@deletedept")->name('admin_dept_delete_show');
    // route for restore dept
    Route::get('/admin/DeptRestore/{id}', "AdminItemController@restoredept")->name('admin_dept_restore_show');
    // route for admin's dashboard
    Route::get('/admin/dashboard', "DashboardController@index")->name("admin_dashboard");





    // New Route For Form PO

    Route::get('/po/Cart', 'AdminPOController@showCart')->name('item_Cart');
    Route::post('/po/Cart/add-item', 'AdminPOController@addItemToCart')->name('item_addToCart');
    Route::get("/po/Cart/delete/{id}", "AdminPOController@deleteMenuCart")->name("Po_cart_delete_show");
    Route::post('/po/Cart/checkout', 'AdminPOController@checkout')->name('cart_checkout');
    Route::get('/po/FormPo', "AdminPOController@index")->name('Po_form_show');
    Route::post('/po/FormPo', "AdminPOController@submit")->name('Po_form_create_post');

    Route::get('/po/Order/{id}', 'AdminPOController@Order')->name('item_order_show');


    Route::get('/po/Vendor', "AdminPOController@vendor")->name('Po_vendor_show');
    Route::post('/po/VendorCreate', "AdminPOController@vendorCreate")->name('Po_vendor_create_post');

    Route::get('/po/VendorUpdate/{id}', "AdminPOController@vendorUpdate")->name('Po_vendor_update_show');

    Route::post('/po/VendorUpdate/{id}', "AdminPOController@update")->name('Po_vendor_update_post');

    Route::get('/po/VendorDelete/{id}', "AdminPOController@vendorDelete")->name('Po_vendor_delete_show');

    Route::get('/po/VendorRestore/{id}', "AdminPOController@vendorRestore")->name('Po_vendor_restore_show');


    Route::get('/po/Product', "AdminPOController@product")->name('Po_product_show');
    Route::post('/po/ProductCreate', "AdminPOController@productcreate")->name('Po_product_create_post');
    Route::get('/po/ProductUpdate/{id}', "AdminPOController@productUpdate")->name('Po_product_update_show');
    Route::post('/po/ProductUpdate/{id}', "AdminPOController@save")->name('Po_product_update_post');


    Route::get('/po/ProductDelete/{id}', "AdminPOController@productDelete")->name('Po_product_delete_show');

    Route::get('/po/ProductRestore/{id}', "AdminPOController@productRestore")->name('Po_product_restore_show');

    Route::get('/po/dashboard', "DashboardController@indexpo")->name("Po_dashboard");





    // New Route For Detail
    Route::get('/detail/detailStatus', "AdminItemController@detailStatus");
    Route::get('/detail/detailApp', "AdminItemController@detailApp");
    Route::get('/detail/detailRej', "AdminItemController@detailRej");
    Route::get('/detail/print', "AdminItemController@print");

    // New Route For Admin Approval 
    Route::get('/approval/listApp', "AdminAccController@Index")->name('App_form_show');
    Route::get('/approval/details/{id}', "AdminAccController@detailapproval")->name('App_detail_show');
    Route::post('/approval/details/{id}/approved', "AdminAccController@submit")->name('App_detail_show_approved');
    Route::post('/approval/details/{id}/rejected', "AdminAccController@reject")->name('App_detail_show_rejected');
    Route::get('/approval/dashboard', "DashboardController@indexacc")->name("Acc_dashboard");

});
