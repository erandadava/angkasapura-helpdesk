<?php

namespace App\DataTables;

use App\Models\issues;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Auth;
class issuesDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'issues.datatables_actions')->editColumn('status', function ($inquiry) {
            if ($inquiry->status == null) return "<span class='label label-default'>Menunggu IT Administrator</span>";
            if ($inquiry->status == 'RITADM') return "<span class='label label-danger'>Ditolak & Menunggu Alasan Dari IT Administrator</span>";
            if ($inquiry->status == 'AITADM') return "<span class='label label-success'>Diterima IT Administrator</span>";
            if ($inquiry->status == 'ITSP') return "<span class='label label-info'>Diteruskan ke IT Support</span>";
            if ($inquiry->status == 'RITSP') return "<span class='label label-danger'>Ditolak & Menunggu Alasan Dari IT Support</span>";
            if ($inquiry->status == 'AITSP') return "<span class='label label-warning'>Menunggu Solusi Dari IT Support</span>";
            if ($inquiry->status == 'ITOPS') return "<span class='label label-warning'>Menunggu Solusi Dari IT OPS</span>";
            if ($inquiry->status == 'CLOSE') return "<span class='label label-success'>Keluhan Ditutup</span>";
            if ($inquiry->status == 'SLITADM') return "<span class='label label-success'>Solusi Telah Diberikan IT Administrator</span>";
            if ($inquiry->status == 'SLITOPS') return "<span class='label label-success'>Solusi Telah Diberikan IT OPS</span>";
            return 'Cancel';
        })
        ->rawColumns(['status','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\issues $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(issues $model)
    {   
        $user = Auth::user();
        $roles = $user->getRoleNames();

        if($roles[0] == "IT Administrator"){
            return $model->with(['category','priority','request'])->newQuery();
        }
        return $model->with(['category','priority','request'])->where('request_id','=',$user->id)->orWhere('assign_it_ops','=',$user->id)->orWhere('assign_it_support','=',$user->id)->newQuery();
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
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
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
            ['data' => 'category.cat_name', 'title' => 'Kategori'],
            ['data' => 'issue_id', 'title' => 'Kode'],
            ['data' => 'priority.prio_name', 'title' => 'Prioritas'],
            ['data' => 'request.name', 'title' => 'Request'],
            ['data' => 'location', 'title' => 'Lokasi'],
            ['data' => 'status', 'title' => 'Status'],
            ['data' => 'issue_date', 'title' => 'Waktu Keluhan'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'issuesdatatable_' . time();
    }
}
