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

Route::get('/contracts', 'ContractsController@index' ) ;
Route::get('/billing', 'BillingController@index' ); 
Route::get('/overview', 'OverviewController@index' );
Route::get('/rooms', 'RoomsController@index' );
Route::get('/tentants', 'TenantsController@index' );

/*
Route::get('/billing', function () {
    return view('pages/billing.show');
});

Route::get('/contracts', function () {
    return view('pages/contracts.show');
});

Route::get('/overview', function () {
    return view('pages/overview.overview');
});

Route::get('/rooms', function () {
    return view('pages/rooms.show');
});

Route::get('/tentants', function () {
    return view('pages/tentants.show');
});
*/
Auth::routes();
