<?php
use App\Order;
use App\StoreAgent;
Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('fieldagent')->user();
    $user=Auth::user();
    $storeagent=Storeagent::where('fieldagent_id',$user->id)->first();
    $store=App\Store::where('id',$storeagent->store_id)->first();
    $orders = Order::where('orders.agent_id',$store->agent_id)
        ->get();
    $total=DB::table('orders')
    ->where('orders.agent_id',$store->agent_id)
        ->select('quantity', DB::raw('count(*) as total'))
        ->groupBy('quantity');
    $chart = Charts::create('bar', 'highcharts')
        ->title('Orders In kg')
        ->elementLabel('Total')
        ->values($total->pluck('total')->toArray())
        ->labels($total->pluck('quantity')->toArray())
        ->credits(false)
        ->responsive(false);
    if($user->active){
        return view('fieldagent.home', compact('orders','user','chart'));
    }
    return redirect('/')->withErrors('Your account is not active');
})->name('home');

