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

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable->addColumn('action', 'laporans.datatables_actions_bulanan')
        // return $dataTable->editColumn('sernum', function ($inquiry)
        // {
        //     return (int) $inquiry->sernum_count;
        // })
        ->editColumn('issuesjmlsla_count', function ($inquiry)
        {
            $hasilrusak = 0;
            foreach ($inquiry->issues as $key => $value) {
                $interval = $value['issue_date']->diffInMinutes($value['complete_date'], true);
                $interval = (int) $interval / 60 / 24;
                $hasilrusak += $interval*24;
            }

            $hasil = ((720 - $hasilrusak)/720)*100;
            $hasil = number_format($hasil, 2, '.', ' ');
            return $hasil.'%';
        })
        ->with('all_data', function() use ($query) {
            return $query->get();
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
       
       if($this->tgl){
            $tglnya = new Carbon($this->tgl);
        }else{
            $now = Carbon::now();
            $tglnya = $now;
        }
    //    return $model->withCount('sernum')->whereMonth('complete_date', '=', $now->month)->newQuery();
       return $model->with(['issues' => function($query) use($tglnya)
       {
            $query->where('cat_id','=',2)
            ->whereYear('issue_date',$tglnya->year)    
            ->whereMonth('issue_date',$tglnya->month);
       }]
       )->withCount(['issues' => function($query) use($tglnya){
            $query->where('cat_id','=',2)
            ->whereYear('issue_date',$tglnya->year)    
            ->whereMonth('issue_date',$tglnya->month);
       },'issuesjmlsla'])->newQuery();

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
                'dom'     => 'Blfrtip',
                'order'   => [[0, 'asc']],
                "pageLength" => 50,
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

        return [
            ['data' => 'id','visible' => false],
            ['data' => 'nama_user', 'title' => 'Nama user'],
            ['data' => 'nama_perangkat', 'title' => 'Nama Perangkat'],
            ['data' => 'sernum', 'title' => 'Serial Number'],
            ['data' => 'merk', 'title' => 'Merk'],
            ['data' => 'nama_perangkat_full', 'title' => 'Nama Perangkat Full'],
            ['data' => 'issues_count', 'title' => 'Jumlah Keluhan', 'searchable' => false],
            ['data' => 'issuesjmlsla_count', 'title' => 'SLA','searchable' => false],
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
