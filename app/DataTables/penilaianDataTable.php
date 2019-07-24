<?php

namespace App\DataTables;

use App\Models\issues;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Auth;
class penilaianDataTable extends DataTable
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
            if ($inquiry->status == 'RT') return "<span class='label label-warning'>User Telah Memberi Rating</span>";
            return 'Cancel';
        })->editColumn('rating.rate', function ($inquiry) {
            if ($inquiry->rating->rate == '0') return "<p><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span></p>";
            if ($inquiry->rating->rate == '1') return "<p><span class='glyphicon glyphicon-star' style='color:orange'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span></p>";
            if ($inquiry->rating->rate == '2') return "<p><span class='glyphicon glyphicon-star' style='color:orange'></span><span class='glyphicon glyphicon-star' style='color:orange'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span></p>";
            if ($inquiry->rating->rate == '3') return "<p><span class='glyphicon glyphicon-star' style='color:orange'></span><span class='glyphicon glyphicon-star' style='color:orange'></span><span class='glyphicon glyphicon-star' style='color:orange'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span></p>";
            if ($inquiry->rating->rate == '4') return "<p><span class='glyphicon glyphicon-star' style='color:orange'></span><span class='glyphicon glyphicon-star' style='color:orange'></span><span class='glyphicon glyphicon-star' style='color:orange'></span><span class='glyphicon glyphicon-star' style='color:orange'></span><span class='glyphicon glyphicon-star'></span></p>";
            if ($inquiry->rating->rate == '5') return "<p><span class='glyphicon glyphicon-star' style='color:orange'></span><span class='glyphicon glyphicon-star' style='color:orange'></span><span class='glyphicon glyphicon-star' style='color:orange'></span><span class='glyphicon glyphicon-star' style='color:orange'></span><span class='glyphicon glyphicon-star' style='color:orange'></span></p>";
            return '0';
        })
        ->rawColumns(['status','rating.rate','action']);
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

        if($roles[0] == "IT Administrator" || $roles[0] == "Admin"){
            return $model->with(['category','priority','request','rating'])->where('status','=','RT')->newQuery();
        }
        return $model->with(['category','priority','request','rating'])->where([['request_id','=',$user->id],['status','=','RT']])->orWhere([['assign_it_ops','=',$user->id],['status','=','RT']])->orWhere([['assign_it_support','=',$user->id],['status','=','RT']])->newQuery();
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
        return [
            ['data' => 'id','visible' => false],
            ['data' => 'category.cat_name', 'title' => 'Kategori'],
            ['data' => 'issue_id', 'title' => 'Kode'],
            ['data' => 'priority.prio_name', 'title' => 'Prioritas'],
            ['data' => 'request.name', 'title' => 'Request'],
            ['data' => 'rating.rate', 'title' => 'Rating'],
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
