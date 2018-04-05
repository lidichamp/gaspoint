<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('store_owner')->user();

    //dd($users);

    return view('store-owner.home');
})->name('home');

