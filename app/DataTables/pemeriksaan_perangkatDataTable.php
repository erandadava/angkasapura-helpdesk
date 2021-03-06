<?php

namespace App\DataTables;

use App\Models\pemeriksaan_perangkat;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

use Carbon\Carbon;
class pemeriksaan_perangkatDataTable extends DataTable
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

        // return $dataTable->addColumn('action', 'pemeriksaan_perangkats.datatables_actions');
        return $dataTable->addColumn('action', 'pemeriksaan_perangkats.datatables_actions')->editColumn('selesai_jam_pengecekan', function ($inquiry) {
             if ($inquiry->tanggal_pengecekan != null){
                 return $inquiry->tanggal_pengecekan->format('d-m-Y').'  '.$inquiry->selesai_jam_pengecekan;
             }
             else {
                 return "-".$inquiry->selesai_jam_pengecekan ;
             }
        });

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\pemeriksaan_perangkat $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(pemeriksaan_perangkat $model)
    {
        return $model->newQuery();
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
                'order'   => [[3, 'desc'], [4, 'desc']],
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
            ['data' => 'nama_pengguna_pc', 'title' => 'Nama Pengguna Komputer'],
            'lokasi',
            'serial_number',
            ['data' => 'tanggal_pengecekan', 'title' => 'Tanggal Pengecekan', 'visible' => false],
            ['data' => 'selesai_jam_pengecekan', 'title' => 'Selesai Pengecekan'],
            ['data' => 'full_computer_name', 'title' => 'Nama Komputer Lengkap'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'pemeriksaan_perangkatsdatatable_' . time();
    }
}
