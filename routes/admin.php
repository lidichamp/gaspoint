<?php
use App\Store;
use App\DataTables\OrdersDataTable;
use DB;
Route::get('/home', function (OrdersDataTable $dataTable) {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();
    $user=Auth::user();

    $total=DB::table('orders')
        ->select('agent_id', DB::raw('count(*) as total'))
        ->groupBy('agent_id');


    $chart = Charts::create('bar', 'highcharts')
        ->title('Orders')
        ->elementLabel('Total')
        ->values($total->pluck('total')->toArray())
        ->labels(Store::whereIn('agent_id',$total->pluck('agent_id')->toArray())->pluck('name')->toArray())
        ->credits(false)
        ->responsive(false);

    return $dataTable->render('admin.home',compact('user','chart'));});


