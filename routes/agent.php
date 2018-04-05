<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('agent')->user();

    $orders = Order::where('agent_id', auth()->id())->get();
    //dd($users);

    return view('agent.home');
})->name('home', compact('orders'));

