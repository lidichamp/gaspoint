<?php
use App\Order;

use Illuminate\Http\Request;
Route::get('/home', function (Request $request) {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('agent')->user();
    $id=$request->user('agent')->id;
    $orders = Order::where('agent_id',$id)->get();
  //  dd($orders->get());

    return view('agent.home', compact('orders','id'));
})->name('home');

