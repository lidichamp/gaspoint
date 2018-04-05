<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Store;
class StoreController extends Controller
{   
    public function getLocations()
    {
     return Response::json(Store::all());
    }
         
}
