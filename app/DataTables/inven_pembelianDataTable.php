<?php

namespace App\DataTables;

use App\Models\inven_pembelian;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class inven_pembelianDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'inven_pembelians.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\inven_pembelian $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(inven_pembelian $model)
    {
        return $model->with('unit_kerjas')->newQuery();
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
            // 'id_inventory_fk',
            ['data' => 'nama_perangkat', 'title' => 'Nama Perangkat'],
            ['data' => 'unit_kerjas.nama_uk', 'title' => 'Nama Perangkat'],
            ['data' => 'nama_alat', 'title' => 'Nama Alat'],
            ['data' => 'keperluan', 'title' => 'Keperluan'],
            ['data' => 'tgl_pembelian', 'title' => 'Tanggal Pembelian'],
            ['data' => 'tgl_penyerahan', 'title' => 'Tanggal Penyerahan'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'inven_pembeliansdatatable_' . time();
    }
}
