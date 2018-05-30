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

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');
  Route::get('/manage/depots','DepotController@manage_depots')->name('manage.depots');
    Route::get('/manage/agents','DepotController@manage_agents')->name('manage.depots');

  //Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  //Route::post('/register', 'AdminAuth\RegisterController@register');
  Route::get('/assign/agent/{id}','FieldagentController@showApprove')->name('agent.assign');
  Route::post('/approve/agent/{id}','FieldagentController@Approve')->name('agent.approve');
  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'agent'], function () {
  Route::get('/login', 'AgentAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AgentAuth\LoginController@login');
  Route::post('/logout', 'AgentAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AgentAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/save', 'AgentAuth\RegisterController@create');
  Route::post('/password/email', 'AgentAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AgentAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AgentAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AgentAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'store-owner'], function () {
  Route::get('/login', 'StoreOwnerAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'StoreOwnerAuth\LoginController@login');
  Route::post('/logout', 'StoreOwnerAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'StoreOwnerAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'StoreOwnerAuth\RegisterController@register');

  Route::post('/password/email', 'StoreOwnerAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'StoreOwnerAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'StoreOwnerAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'StoreOwnerAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'client'], function () {
  Route::get('/login', 'ClientAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'ClientAuth\LoginController@login');
  Route::post('/logout', 'ClientAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'ClientAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'ClientAuth\RegisterController@register');
  
  Route::post('/password/email', 'ClientAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'ClientAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'ClientAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'ClientAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'orders'],function()
{
  $users[] = Auth::user();
  $users[] = Auth::guard()->user();
  $users[] = Auth::guard('agent')->user();
  Route::post('/save', 'OrderController@createOrder')->name('create.order');
  Route::get('/cancel/{id}', 'OrderController@cancelOrder')->name('cancel.order');
  Route::get('/deliver/{id}', 'OrderController@deliverOrder')->name('deliver.order');
});

Route::group(['prefix' => 'fieldagent'], function () {
  Route::get('/login', 'FieldagentAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'FieldagentAuth\LoginController@login');
  Route::post('/logout', 'FieldagentAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'FieldagentAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'FieldagentAuth\RegisterController@register');

  Route::post('/password/email', 'FieldagentAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'FieldagentAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'FieldagentAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'FieldagentAuth\ResetPasswordController@showResetForm');
});
