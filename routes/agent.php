<?php
use App\Order;

use Illuminate\Http\Request;
Route::get('/home', function (Request $request) {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('agent')->user();
    $user=$request->user('agent');
    $orders = Order::where('agent_id',$user->id)->get();
  //  dd($orders->get());

    return view('agent.home', compact('orders','user'));
})->name('home');

