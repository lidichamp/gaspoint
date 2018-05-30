<?php

namespace App\DataTables;

use App\Order;
use Yajra\Datatables\Services\DataTable;

class OrdersDataTable extends DataTable
{
    private $route_definition='deliver.order';
    private $route_definition2='cancel.order';
    /**
     * Build DataTable class.
     *
     * @return \Yajra\Datatables\Engines\BaseEngine
     */
    public function dataTable()
    {
        return $this->datatables
            ->eloquent($this->query());
            }


    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Order::query()->select('orders.id as id','clients.name as client','stores.name as depot','orders.address as drop_of_location','orders.quantity as quantity(kg)','orders.payment_method','orders.status')
        ->leftJoin('clients','orders.client_id','clients.id')
        ->leftJoin('stores','orders.agent_id','stores.agent_id');

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->removeColumn('id')
                    ->minifiedAjax('')
                    ->addAction(['width' => '80px'])
                    ->parameters([
                        'dom'     => 'Bfrtip',
                        'order'   => [[0, 'desc']],
                        'buttons' => [

                        ],
                    ]);
    }
    public function ajax(){

        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', function($one) {
            $menu = '<a href="' . route($this->route_definition, $one->id) . '" title="Mark as delivered"><i class="fa fa-check text-success"></i></a>&nbsp;';
            if ($one->status == 0) {
                $menu .= '<a href="' . route($this->route_definition2, $one->id) . '" title="cancel Order"><i class="fa fa-times text-danger"></i></a>&nbsp';
            }
            return $menu;
        })
            ->make(true);
    }
    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'client',
            'depot',
            'drop_of_location',
            'quantity(kg)',
            'payment_method',
            'status'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ordersdatatable_' . time();
    }
}
