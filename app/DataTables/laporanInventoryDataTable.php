<?php

namespace App\DataTables;

use App\Models\inventory;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class laporanInventoryDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'inventories.datatables_actions')->editColumn('is_active', function ($inquiry) {
            if ($inquiry->is_active == 0) return "<span class='label label-danger'>Non-Aktif</span>";
            if ($inquiry->is_active == 1) return "<span class='label label-success'>Aktif</span>";
            return 'Cancel';
        })
        ->rawColumns(['is_active','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\inventory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(inventory $model)
    {
        return $model->with('cat_inventory')->newQuery();
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
        return [
            ['data' => 'id','visible' => false],
            ['data' => 'cat_inventory.nama_cat', 'title' => 'Kategori Inventaris'],
            ['data' => 'lokasi', 'title' => 'Lokasi'],
            ['data' => 'merk', 'title' => 'Merk'],
            ['data' => 'tgl_pembelian', 'title' => 'Tanggal Pembelian'],
            ['data' => 'tgl_penyerahan', 'title' => 'Tanggal Penyerahan'],
            ['data' => 'is_active', 'title' => 'Status'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'inventoriesdatatable_' . time();
    }
}
