<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
class StoreController extends Controller
{
    public function createStore()
    {
    return view('laravel-authentication-acl::admin.user.register-store');
    }

    public function saveStore(Request $request)
    {   $store=new Store;
        $store->name=$request->name;
        $store->street_address=$request->street_address;
        $store->city=$request->city;
        $store->state=$request->state;
        $store->postal_code=$request->postal_code;
        $store->lat=$request->lat;
        $store->lng=$request->lng;
        $store->save();
    }
}
