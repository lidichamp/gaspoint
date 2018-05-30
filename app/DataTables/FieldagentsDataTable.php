<?php

namespace App\DataTables;

use App\Fieldagent;
use Yajra\Datatables\Services\DataTable;

class FieldagentsDataTable extends DataTable
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
        $query = Fieldagent::query()->select($this->getColumns());

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
                $menu=" ";
                if($one->active==0) {
                    $menu .= '<a href="' . route($this->route_definition, $one->id) . '" title="Approve Agent"><i class="fa fa-check text-success"></i></a>&nbsp;';
                }
                elseif ($one->active == 1) {
                    $menu .= '<a href="' . route($this->route_definition2, $one->id) . '" title="Disable Agent"><i class="fa fa-times text-danger"></i></a>&nbsp';
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
            'name',
            'email',
            'phone',
            'active'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'fieldagents_' . time();
    }
}
