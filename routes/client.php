<?php

use App\Order;
use App\Agent;

use Illuminate\Http\Request;
Route::get('/home', function (Request $request) {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('client')->user();
    $user=$request->user('client');
    $orders = Order::where('client_id',$user->id)->get();
    $agents = Agent::all();
    //dd($users);

    return view('client.home', compact('orders','user','agents'));
})->name('home');

Route::get('/order/{id}', function (Request $request) {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('client')->user();
    $users[] = Auth::guard('client')->user();
    $user=$request->user('client');
    $orders = Order::where('client_id',$user->id)->get();
    $agents = Agent::all();
  //  dd($orders->get());

    return view('client.order', compact('orders','user','agents'));
})->name('order');


