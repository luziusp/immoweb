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

Route::get('/', 'HomeController@index');

Route::resource('tenants', 'TenantsController')->middleware('auth');
Route::resource('rooms', 'RoomsController')->middleware('auth');
Route::resource('contracts', 'ContractsController')->middleware('auth');
Route::resource('billing', 'BillingController')->middleware('auth');
Route::resource('overview', 'OverviewController')->middleware('auth');


//Laravel
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LogoutController@logout');


/*
Route::get('/contracts', 'ContractsController@index' ) ;
Route::get('/billing', 'BillingController@index' );
Route::get('/overview', 'OverviewController@index' );
Route::get('/rooms', 'RoomsController@index' );


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
