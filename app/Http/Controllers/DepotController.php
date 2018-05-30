<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\DataTables\DepotDataTable;
use App\DataTables\AgentDataTable;
class DepotController extends Controller
{
    public function manage_depots(DepotDataTable $dataTable)
    {
        $user = Auth::guard('admin')->user();
        return $dataTable->render('admin.depots',compact('user'));
    }
    public function manage_agents(AgentDataTable $dataTable)
    {
        $user = Auth::guard('admin')->user();
        return $dataTable->render('admin.depots',compact('user'));
    }
}
