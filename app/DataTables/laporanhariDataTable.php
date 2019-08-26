<?php

namespace App\DataTables;

use App\Models\issues;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Auth;
use App\Models\inventory;
use Carbon\Carbon;
use DB;
class laporanhariDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'laporans.datatables_actions')->editColumn('status', function ($inquiry) {
            if ($inquiry->status == null) return "<span class='label label-default'>Menunggu IT Administrator</span>";
                if ($inquiry->status == 'AITADM') return "<span class='label label-success'>Diterima IT Administrator</span>";
                if ($inquiry->status == 'ITADM') return "<span class='label label-info'>Diteruskan ke IT Administrator</span>";
                if ($inquiry->status == 'ITSP') return "<span class='label label-info'>Diteruskan ke IT Support</span>";
                if ($inquiry->status == 'RITADM') return "<span class='label label-danger'>Tiket diteruskan ke IT Operasional</span>";
                if ($inquiry->status == 'RITSP') return "<span class='label label-danger'>Tiket diteruskan ke IT Operasional</span>";
                if ($inquiry->status == 'AITSP') return "<span class='label label-warning'>Menunggu Tindakan Dari IT Support</span>";
                if ($inquiry->status == 'ITOPS') return "<span class='label label-warning'>Menunggu Tindakan Dari IT OPS</span>";
                if ($inquiry->status == 'CLOSE') return "<span class='label label-success'>Keluhan Selesai</span>";
                if ($inquiry->status == 'SLITADM') return "<span class='label label-success'>Solusi Telah Diberikan IT Administrator</span>";
                if ($inquiry->status == 'SLITOPS') return "<span class='label label-success'>Solusi Telah Diberikan IT OPS</span>";
                if ($inquiry->status == 'SLITSP') return "<span class='label label-success'>Solusi Telah Diberikan IT Support</span>";
                if ($inquiry->status == 'LITADM') return "<span class='label label-info'>IT Administrator Menuju ke Lokasi</span>";
                if ($inquiry->status == 'LITOPS') return "<span class='label label-info'>IT OPS Menuju ke Lokasi</span>";
                if ($inquiry->status == 'LITSP') return "<span class='label label-info'>IT Support Menuju ke Lokasi</span>";
                if ($inquiry->status == 'DLITADM') return "<span class='label label-warning'>Sedang Dalam Tindakan IT Administrator</span>";
                if ($inquiry->status == 'DLITOPS') return "<span class='label label-warning'>Sedang Dalam Tindakan IT OPS</span>";
                if ($inquiry->status == 'DLITSP') return "<span class='label label-warning'>Sedang Dalam Tindakan IT Support</span>";
                if ($inquiry->status == 'RT') return "<span class='label label-warning'>User Telah Memberi Rating</span>";
                return 'Cancel';
        })
        ->editColumn('waktu_tanggap', function ($inquiry) {
            $finish = Carbon::parse($inquiry->solution_date);
            $totalDuration = $finish->diffInSeconds(Carbon::parse($inquiry->waktu_tindakan));
            return gmdate('H:i:s', $totalDuration);
        })
        ->with('all_data', function() use ($query) {
            return $query->get();
        })
        ->rawColumns(['status','prob_desc','solution_desc','reason_desc','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\issues $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(issues $model)
    {
        $now = Carbon::now();
        $user = Auth::user();
        $roles = $user->getRoleNames();
        if($roles[0] == "IT Non Public" || $roles[0] == "IT Operasional" || $roles[0] == "Admin"){
            $hasil = \App\Models\issues::select('*',
            \DB::raw('(CASE 
                        WHEN DATE_FORMAT(issue_date,"%H:%i:%s") >= "07:00:00" &&  DATE_FORMAT(issue_date,"%H:%i:%s") <= "19:00:00" THEN "Laporan Pagi" 
                        ELSE "Laporan Malam" 
                        END) AS status_laporan')
            )
            ->with(['category','priority','request','unit_kerja','complete'])
            ->whereColumn('assign_it_ops', 'complete_by')
            ->where([['status','=','CLOSE']])
            ->whereDate('complete_date','=',$now->format('Y-m-d'))
            ->orWhereColumn('assign_it_support', 'complete_by')
            ->where([['status','=','CLOSE']])
            ->whereDate('complete_date','=',$now->format('Y-m-d'))
            ->orWhereColumn('assign_it_admin', 'complete_by')
            ->where([['status','=','CLOSE']])
            ->whereDate('complete_date','=',$now->format('Y-m-d'))
            ->orderBy('status_laporan','desc')
            ->newQuery();
            return $hasil;
        }
        $hasil = \App\Models\issues::select('*',
            \DB::raw('(CASE 
                        WHEN DATE_FORMAT(issue_date,"%H:%i:%s") >= "07:00:00" &&  DATE_FORMAT(issue_date,"%H:%i:%s") <= "19:00:00" THEN "Laporan Pagi" 
                        ELSE "Laporan Malam" 
                        END) AS status_laporan')
            )
            ->with(['category','priority','request','unit_kerja','complete'])
            ->where([['assign_it_ops','=',Auth::user()->id],['complete_by','=',Auth::user()->id],['status','=','CLOSE']])
            ->whereDate('complete_date','=',$now->format('Y-m-d'))
            ->orWhere([['assign_it_support','=',Auth::user()->id],['complete_by','=',Auth::user()->id],['status','=','CLOSE']])
            ->whereDate('complete_date','=',$now->format('Y-m-d'))
            ->orWhere([['assign_it_admin','=',Auth::user()->id],['complete_by','=',Auth::user()->id],['status','=','CLOSE']])
            ->whereDate('complete_date','=',$now->format('Y-m-d'))
            ->orderBy('status_laporan','desc')
            ->newQuery();
            return $hasil;

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
                "columnDefs" => [
                    [ "visible" => false, "targets" => [2] ]
                ],
                'buttons' => [
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
                    'initComplete' => "function () {
                    var rows = this.api().rows( {page:'current'} ).nodes();
                    var last=[];
                    this.api().column(2, {page:'current'} ).data().each( function ( group, i ) {
                        var found =  $.map(last, function(value, key) {
                                         if (value == group)
                                         {
                                            return value;
                                         }
                                    });
                        if ( found.length == 0 ) {
                            $(rows).eq( i ).before(
                                '<tr class=group><td colspan=11>'+group+'</td></tr>'
                            );
         
                            last.push(group);
                        }
                    } );
                }",
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
            ['data' => 'request.name', 'title' => 'Name'],
            ['data' => 'status_laporan', 'title' => 'Waktu Laporan',  'orderable' => false, 'searchable' => false],
            // ['data' => 'location', 'title' => 'Lokasi'],
            ['data' => 'unit_kerja.nama_uk', 'title' => 'Unit Kerja'],
            ['data' => 'prob_desc', 'title' => 'Keluhan'],  
            ['data' => 'issue_date', 'title' => 'Waktu Keluhan'],
            ['data' => 'waktu_tindakan', 'title' => 'Waktu Penanganan'],
            ['data' => 'solution_date', 'title' => 'Waktu Selesai'],
            ['data' => 'waktu_tanggap', 'title' => 'Waktu Tanggap', 'orderable' => false, 'searchable' => false],
            ['data' => 'solution_desc', 'title' => 'Solusi'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'laporanharidatatable_' . time();
    }
}
