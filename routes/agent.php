<?php
use App\Order;

use Illuminate\Http\Request;
Route::get('/home', function (Request $request) {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('agent')->user();
    $user=$request->user('agent');
    
    $orders = Order::where('agent_id',$user->id)->get();
    $total=DB::table('orders')
    ->where('agent_id',$user->id)
    ->select('quantity', DB::raw('count(*) as total'))
    ->groupBy('quantity');
    $chart = Charts::create('bar', 'highcharts')
    ->title('Orders')
    ->elementLabel('Total')
    ->values($total->pluck('total')->toArray())
    ->labels($total->pluck('quantity')->toArray())
    ->credits(false)
    ->responsive(false);
    return view('agent.home', compact('orders','user','chart'));
})->name('home');

