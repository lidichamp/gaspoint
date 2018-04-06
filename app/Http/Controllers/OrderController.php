<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Agent;
use App\Client;
use App\Order;
class OrderController extends Controller
{

    public function createOrder(Request $request)
    {
        // $this->validate(request(),[
        //     ]);        
            
       
        $addorder= new Order();
        $addorder->address= $request['address'];
        $addorder->quantity= $request['quantity'];
        $addorder->agent_id= $request['agent_id'];
        $addorder->client_id=$request->user('client')->id;
        $addorder->others= $request['others'];
        $addorder->phone= $request['phone'];
        $addorder->save();
        notify()->success('Order Placed', 'Your gas order has been placed, the agent will contact you soon. ');
            
    return redirect('client/home');
    }
    
    
          
}
