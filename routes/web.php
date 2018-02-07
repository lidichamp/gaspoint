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
//order
Route::group(['middleware' => ['admin_logged', 'can_see']], function ()
{
    Route::get('admin/order', 'OrderController@createOrder')->name('order');
});