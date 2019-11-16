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
    return view('welcome');
});

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