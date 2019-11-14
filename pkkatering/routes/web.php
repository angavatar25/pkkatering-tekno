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
    Route::get('/dashboard', 'DashboardController@admin')->name('dashboard.admin');

    Route::group(['prefix' => 'role'], function () {
       Route::get('/', 'RoleController@index')->name('role');
       Route::get('/create', 'RoleController@create')->name('role.create');
       
       Route::post('/edit', 'RoleController@edit')->name('role.edit');
       Route::post('/store', 'RoleController@store')->name('role.store');
       Route::post('/update', 'RoleController@update')->name('role.update');
       Route::post('/delete', 'RoleController@delete')->name('role.delete');
    });
});

Route::group(['prefix' => 'seller'], function () {
    Route::get('/dashboard', 'DashboardController@seller')->name('dashboard.seller');
});

Route::group(['prefix' => 'custommer'], function () {
    Route::get('/dashboard', 'DashboardController@custommer')->name('dashboard.custommer');
});