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
        $user = Auth::user();
        $roles = $user->getRoleNames();

        if($roles[0] == "IT Non Public" || $roles[0] == "Admin"){
            return $dataTable->addColumn('action', 'issues.datatables_actions')->editColumn('status', function ($inquiry) {
                if ($inquiry->status == null) return "<span class='label label-default'>Menunggu IT Administrator</span>";
                if ($inquiry->status == 'RITADM') return "<span class='label label-danger'>Ditolak & Menunggu Alasan Dari IT Administrator</span>";
                if ($inquiry->status == 'AITADM') return "<span class='label label-success'>Diterima IT Administrator</span>";
                if ($inquiry->status == 'ITSP') return "<span class='label label-info'>Diteruskan ke IT Support</span>";
                if ($inquiry->status == 'RITSP') return "<span class='label label-danger'>Keluhan Tidak Dapat Diatasi Oleh IT Support & Menunggu Konfirmasi Dari IT Administrator</span>";
                if ($inquiry->status == 'AITSP') return "<span class='label label-warning'>Menunggu Tindakan Dari IT Support</span>";
                if ($inquiry->status == 'ITOPS') return "<span class='label label-warning'>Menunggu Tindakan Dari IT OPS</span>";
                if ($inquiry->status == 'CLOSE') return "<span class='label label-success'>Hasil Tindakan</span>";
                if ($inquiry->status == 'SLITADM') return "<span class='label label-success'>Solusi Telah Diberikan IT Administrator</span>";
                if ($inquiry->status == 'SLITOPS') return "<span class='label label-success'>Solusi Telah Diberikan IT OPS</span>";
                if ($inquiry->status == 'SLITSP') return "<span class='label label-success'>Solusi Telah Diberikan IT Support</span>";
                if ($inquiry->status == 'LITOPS') return "<span class='label label-info'>IT OPS Menuju ke Lokasi</span>";
                if ($inquiry->status == 'LITSP') return "<span class='label label-info'>IT Support Menuju ke Lokasi</span>";
                if ($inquiry->status == 'DLITOPS') return "<span class='label label-warning'>Sedang Dalam Tindakan IT OPS</span>";
                if ($inquiry->status == 'DLITSP') return "<span class='label label-warning'>Sedang Dalam Tindakan IT Support</span>";
                if ($inquiry->status == 'RT') return "<span class='label label-warning'>User Telah Memberi Rating</span>";
                return 'Cancel';
            })
            ->setRowClass(function($dataTable) {
                return $dataTable->status_alert == 0 ? '' : 'danger';
            })
            ->rawColumns(['status','action']);
        }

        return $dataTable->addColumn('action', 'issues.datatables_actions')->editColumn('status', function ($inquiry) {
            if ($inquiry->status == null) return "<span class='label label-default'>Menunggu IT Administrator</span>";
            if ($inquiry->status == 'RITADM') return "<span class='label label-danger'>Ditolak & Menunggu Alasan Dari IT Administrator</span>";
            if ($inquiry->status == 'AITADM') return "<span class='label label-success'>Diterima IT Administrator</span>";
            if ($inquiry->status == 'ITSP') return "<span class='label label-info'>Diteruskan ke IT Support</span>";
            if ($inquiry->status == 'RITSP') return "<span class='label label-danger'>Keluhan Tidak Dapat Diatasi Oleh IT Support & Menunggu Konfirmasi Dari IT Administrator</span>";
            if ($inquiry->status == 'AITSP') return "<span class='label label-warning'>Menunggu Tindakan Dari IT Support</span>";
            if ($inquiry->status == 'ITOPS') return "<span class='label label-warning'>Menunggu Tindakan Dari IT OPS</span>";
            if ($inquiry->status == 'CLOSE') return "<span class='label label-success'>Keluhan Selesai</span>";
            if ($inquiry->status == 'SLITADM') return "<span class='label label-success'>Solusi Telah Diberikan IT Administrator</span>";
            if ($inquiry->status == 'SLITOPS') return "<span class='label label-success'>Solusi Telah Diberikan IT OPS</span>";
            if ($inquiry->status == 'SLITSP') return "<span class='label label-success'>Solusi Telah Diberikan IT Support</span>";
            if ($inquiry->status == 'LITOPS') return "<span class='label label-info'>IT OPS Menuju ke Lokasi</span>";
            if ($inquiry->status == 'LITSP') return "<span class='label label-info'>IT Support Menuju ke Lokasi</span>";
            if ($inquiry->status == 'DLITOPS') return "<span class='label label-warning'>Sedang Dalam Tindakan IT OPS</span>";
            if ($inquiry->status == 'DLITSP') return "<span class='label label-warning'>Sedang Dalam Tindakan IT Support</span>";
            if ($inquiry->status == 'RT') return "<span class='label label-warning'>User Telah Memberi Rating</span>";
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

        if(($roles[0] == "IT Administrator" || $roles[0] == "Admin") || ($roles[0] == "IT Support" && request()->status_jam == 1)){
            return $model->with(['category','priority','request'])->newQuery();
        }
        if($roles[0] == "IT Non Public"){
            // return $model->with(['category','priority','request'])->where('complete_by','=',\DB::raw('assign_it_ops'))->orWhere('request_id','=',$user->id)->orWhere('status','=',null)->newQuery();
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
                'dom'     => 'Blfrtip',
                'order'   => [[0, 'desc']],
                'buttons' => [
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-ulang btn-sm no-corner',],
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
            ['data' => 'statusalert','visible' => false],
            ['data' => 'issue_id', 'title' => 'Kode'],
            ['data' => 'request.name', 'title' => 'Permintaan Oleh'],
            ['data' => 'priority.prio_name', 'title' => 'Prioritas'],
            ['data' => 'issue_date', 'title' => 'Waktu Keluhan'],
            ['data' => 'category.cat_name', 'title' => 'Kategori'],
            ['data' => 'location', 'title' => 'Lokasi'],
            ['data' => 'status', 'title' => 'Status'],

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
