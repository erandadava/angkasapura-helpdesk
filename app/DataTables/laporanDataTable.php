<?php

namespace App\DataTables;

use App\Models\issues;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Auth;
use App\Models\inventory;
use Carbon\Carbon;

class laporanDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'laporans.datatables_actions')
        // return $dataTable->editColumn('sernum', function ($inquiry) 
        // {
        //     return (int) $inquiry->sernum_count;
        // })
        ->editColumn('issuesjmlsla_count', function ($inquiry) 
        {
            $hasil = 100 - ((int) $inquiry->issuesjmlsla_count/30)*100;
            $hasil = number_format($hasil, 2, '.', ' ');
            return $hasil.'%';
        })

        ->rawColumns(['status','action','prob_desc']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\inventory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(inventory $model)
    {   
       //$now = Carbon::now();
    //    return $model->withCount('sernum')->whereMonth('complete_date', '=', $now->month)->newQuery();
       return $model->with(['issues'])->withCount(['issuesjml','issuesjmlsla'])->newQuery();

    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'     => 'Bfrtip',
                'order'   => [[0, 'desc']],
                'buttons' => [
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        // $SLA = \DB::select( \DB::raw('SELECT count(issues.id) as "Jumlah Keluhan", inventory.nama_perangkat, 100-((count(issues.dev_ser_num)/30)*100) as SLA FROM issues RIGHT JOIN inventory ON issues.dev_ser_num = inventory.id GROUP BY inventory.id'));
            
        return [
            ['data' => 'id','visible' => false],
            ['data' => 'nama_perangkat', 'title' => 'Nama Perangkat'],
            // ['data' => 'inventory.sernum', 'title' => 'Serial Number'],
            ['data' => 'issuesjml_count', 'title' => 'Jumlah Keluhan'],
            ['data' => 'issuesjmlsla_count', 'title' => 'SLA'],
            // ['data' =>  'SLA', 'title' => 'SLA'],
            // ['data' => 'complete_date', 'title' => 'Tanggal Selesai'],
        ]; 
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'laporandatatable_' . time();
    }
}
