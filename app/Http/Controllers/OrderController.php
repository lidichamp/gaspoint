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
    return redirect('client/home')->with('success','Your gas order has been placed.');
    }
    
    public function deliverOrder(Request $request,$id)
    {
        $deliverorder=Order::find($id);
        $deliverorder->status="complete";
        $deliverorder->update();
    return back()->with('success');
    }
    public function cancelOrder(Request $request,$id)
    {
        $cancelorder=Order::find($id);
        $cancelorder->status="cancelled";
        $cancelorder->update();
    return back()->with('Danger','Order has been cancelled.');
    }
          
}
