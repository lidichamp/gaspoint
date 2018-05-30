<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Fieldagent;
use App\Store;
use App\Order;
class FieldagentController extends Controller
{

    public function Approve(Request $request)
    {   $agent= Order::find($id);
        $agent->active=true;
        $agent->save();
        $store=new Storeagent();
        $data=$request->all();
        $store->store_id=$data['store'];
        $store->fieldagent_id=$id;
        $store->save();
        return redirect('admin/home')->with('success');
    }
    public function showApprove($id){
        $agent=Order::find($id);
        $depots=Store::all();
        $orders=Order::all();
        return view('admin/assign',compact($agent,$depots,$id,$orders));
    }
    public function Disapprove($id)
    {
        $agent = Order::find($id);
        $agent->active = false;
        $agent->save();
        return redirect('admin/home')->with('success');
    }


}
