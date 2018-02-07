<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createOrder()
    {
        return view('laravel-authentication-acl::admin.user.place-order');
    }
}
