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

Route::get('/billing', 'BillingController@index');

Route::get('/contracts','ContractsController@index') ;

Route::get('/overview', 'OverviewController@index');

Route::get('/rooms', 'RoomsController@index');

Route::get('/tenants', 'TenantsController@index');


Auth::routes();

Route::get('/rooms', 'RoomsController@index')->name('rooms');

Auth::routes();

Route::get('/tenants', 'TenantsController@index')->name('tenants');

Auth::routes();

Route::get('/overview', 'OverviewController@index')->name('overview');

Auth::routes();

Route::get('/contracts','ContractsController@index')->name('contracts');

Auth::routes();

Route::get('/billing', 'BillingController@index')->name('billing');

