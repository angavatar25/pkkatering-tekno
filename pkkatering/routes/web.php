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

Route::get('/', function () {
    // return view('login');
    return view('welcome');
});

// Route::get('/signup', function() {
//     return view('signup');
// });

// Route::get('/contoh', function() {
//     return view('layout.template');
// });

// Route::get('/home', function() {
//     return view('layout.home');
// });

// Route::get('/home/makanan', function() {
//     return view('layout.makanan');
// });

// Route::get('/isidata', function() {
//     return view('detail.isipesan');
// });

// Route::get('/history', function() {
//     return view('layout.history');
// });
Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'DashboardController@index');
    Route::get('/dashboard', 'DashboardController@admin')->name('dashboard.admin');

    Route::group(['prefix' => 'role'], function () {
       Route::get('/', 'RoleController@index')->name('role');
       Route::get('/create', 'RoleController@create')->name('role.create');
       Route::get('/assignee/{id}', 'RoleController@assignee')->name('role.assignee');
       
       Route::post('/edit', 'RoleController@edit')->name('role.edit');
       Route::post('/store', 'RoleController@store')->name('role.store');
       Route::post('/update', 'RoleController@update')->name('role.update');
       Route::post('/delete', 'RoleController@delete')->name('role.delete');
       Route::post('/assign', 'RoleController@assign')->name('role.assign');
    });
});

Route::group(['prefix' => 'seller'], function () {
    Route::get('/', 'DashboardController@index');
    Route::get('/dashboard', 'DashboardController@seller')->name('dashboard.seller');

    Route::group(['prefix' => 'restaurant'], function () {
        Route::get('/', 'RestaurantController@index')->name('restaurant');
        Route::get('/create', 'RestaurantController@create')->name('restaurant.create');

        Route::post('/edit', 'RestaurantController@edit')->name('restaurant.edit');
        Route::post('/store', 'RestaurantController@store')->name('restaurant.store');
        Route::post('/update', 'RestaurantController@update')->name('restaurant.update');
        Route::post('/delete', 'RestaurantController@delete')->name('restaurant.delete');
    });
});

Route::group(['prefix' => 'customer'], function () {
    Route::get('/', 'DashboardController@index');
    Route::get('/dashboard', 'DashboardController@customer')->name('dashboard.customer');
});

Route::group(['prefix' => 'food'], function () {
    Route::get('/', 'FoodController@index')->name('food');
    Route::get('/create', 'FoodController@create')->name('food.create');

    Route::post('/edit', 'FoodController@edit')->name('food.edit');
    Route::post('/store', 'FoodController@store')->name('food.store');
    Route::post('/update', 'FoodController@update')->name('food.update');
    Route::post('/delete', 'FoodController@delete')->name('food.delete');
});

Route::group(['prefix' => 'transaction'], function () {
    Route::get('/', 'TransactionController@index')->name('transaction');
    Route::get('/detail/{id}', 'TransactionController@detail')->name('transaction.detail');

    Route::post('/create', 'TransactionController@create')->name('transaction.create');
    Route::post('/store', 'TransactionController@store')->name('transaction.store');
    Route::post('/proof', 'TransactionController@proof')->name('transaction.proof');
    Route::post('/status', 'TransactionController@status')->name('transaction.status');
});