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


Route::get('admin/login', 'LoginController@index')->name('login');
Route::post('admin/authenticate','LoginController@authenticate')->name('authenticate');
Route::get('admin/logout','LoginController@logout')->name('logout');

Route::group(['middleware' => ['adminLogin:web']], function () {
Route::get('/admin/dashboard','DashboardController@index')->name('dashboard');
Route::get('today-order', 'DashboardController@todayOrder');


Route::get('admin/dashboard/pages','PagesController@index')->name('pages');
Route::get('admin/dashboard/addPage','PagesController@create')->name('addPage');
Route::post('admin/dashboard/createOrUpdatePage/{id?}','PagesController@createOrUpdate')->name('createOrUpdatePage');
Route::get('admin/dashboard/editPage/{id}','PagesController@edit')->name('editPage');
Route::get('admin/dashboard/deletePage/{id}','PagesController@delete')->name('deletePage');

//Order Section
Route::get('admin/orders','OrdersController@index')->name('orders');
 Route::get('admin/orders/search', 'OrdersController@search')->name('orders-search');
 Route::get('admin/orders/view/{id}', 'OrdersController@view')->name('order-view');
 Route::match(['GET','POST'],'vendor-status/{id}', 'OrdersController@vendorStatus')->name('vendor-status');
 Route::match(['GET','POST'],'backend/orders/change-status/{id}', 'OrdersController@changeStatus')->name('change-status');
 Route::match(['GET','POST'],'orders/customer-info/{id}', 'OrdersController@customerInfo')->name('customer-info');
 Route::get('orders/store-details/{id}', 'OrdersController@storeDetails')->name('store-details');
	
// User Section
Route::get('admin/dashboard/addUser','RegisterController@create')->name('addUser');
Route::post('admin/dashboard/createUser', 'RegisterController@register')->name('createUser');
Route::get('admin/dashboard/editUser/{id}','RegisterController@edit')->name('editUser');
Route::post('admin/dashboard/updateUser/{id}','RegisterController@update')->name('updateUser');
Route::get('admin/dashboard/user','RegisterController@getUsers')->name('users');
Route::get('admin/dashboard/active-employee/{id}','RegisterController@active')->name('active-employee');
Route::get('admin/dashboard/inactive-employee/{id}','RegisterController@inactive')->name('inactive-employee');
// Item Menu
Route::get('admin/imenu','ImenusController@index')->name('imenu');
Route::get('admin/imenus/add', 'ImenusController@add')->name('imenus-add');
Route::post('admin/imenus/store', 'ImenusController@store')->name('imenus-store');
Route::get('admin/edit-imenu/{id}','ImenusController@edit')->name('edit-imenu');
Route::get('admin/success-imenu/{id}','ImenusController@active')->name('active-imenu');
Route::get('admin/delete-imenu/{id}','ImenusController@inactive')->name('inactive-imenu');

// store section
Route::get('admin/store','StoreController@index')->name('stores');
Route::get('admin/add-store','StoreController@create')->name('add-store');
Route::post('admin/create-update-store/{id?}','StoreController@updateStore')->name('create-update-store');
Route::get('admin/edit-store/{id}','StoreController@edit')->name('stores-edit');
Route::get('admin/active-store/{id}','StoreController@active')->name('active-store');
Route::get('admin/inactive-store/{id}','StoreController@inactive')->name('inactive-store');
Route::get('stores/view/{id}', 'StoreController@view')->name('stores-view');

//vwallet section
Route::get('admin/vwallet', 'VwalletController@index')->name('vwallets');
Route::get('admin/vwallets/statements', 'VwalletController@statement')->name('vwallet.statement');
Route::get('admin/vwallet/storeStatement/{year}/{month}/{store}/{type?}', 'VwalletController@storeStatement')->name('vwallet.storeStatement');
Route::match(['GET','POST'],'admin/vwallets/add/{id}', 'VwalletController@add')->name('wallet-add');
Route::match(['GET','POST'],'admin/vwallets/edit/{id}', 'VwalletController@edit')->name('wallet-edit');
// station section
Route::get('admin/stations','StationController@index')->name('stations');
Route::get('admin/add-station','StationController@create')->name('add-station');
Route::post('admin/create-update-station/{id?}','StationController@createOrUpdate')->name('create-update-station');
Route::get('admin/edit-station/{id}','StationController@edit')->name('edit-station');
Route::get('admin/active-station/{id}','StationController@active')->name('active-station');
Route::get('admin/inactive-station/{id}','StationController@inactive')->name('inactive-station');  

//messages
Route::get('admin/reviews', 'ReviewsController@index')->name('reviews');
Route::get('admin/reviews/view/{id}', 'ReviewsController@view')->name('review-view');

//messages
Route::get('admin/messages', 'MessageController@index')->name('messages');
Route::get('admin/messages/{id}', 'MessageController@view');

// faq section
Route::get('admin/faq','FaqController@index')->name('faq');
Route::get('admin/add-faq','FaqController@create')->name('add-faq');
Route::post('admin/create-update-faq/{id?}','FaqController@createOrUpdate')->name('create-update-faq');
Route::get('admin/edit-faq/{id}','FaqController@edit')->name('edit-faq');
Route::get('admin/success-faq/{id}','FaqController@active')->name('active-faq');
Route::get('admin/delete-faq/{id}','FaqController@inactive')->name('inactive-faq');

// career section
Route::get('admin/careers','CareerController@index')->name('careers');
Route::get('admin/add-career','CareerController@create')->name('add-career');
Route::post('admin/create-update-career/{id?}','CareerController@createOrUpdate')->name('create-update-career');
Route::get('admin/edit-career/{id}','CareerController@edit')->name('edit-career');
Route::get('admin/active-career/{id}','CareerController@active')->name('active-career');
Route::get('admin/inactive-career/{id}','CareerController@inactive')->name('inactive-career');  


// vendor section
Route::get('admin/vendor','VendorController@index')->name('vendors');
Route::get('admin/add-vendor','VendorController@create')->name('add-vendor');
Route::post('admin/create-update-vendor/{id?}','VendorController@createOrUpdate')->name('create-update-vendor');
Route::get('admin/edit-vendor/{id}','VendorController@edit')->name('edit-vendor');
Route::get('admin/active-vendor/{id}','VendorController@active')->name('active-vendor');
Route::get('admin/inactive-vendor/{id}','VendorController@inactive')->name('inactive-vendor');


});

