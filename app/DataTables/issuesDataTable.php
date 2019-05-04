<?php

namespace App\DataTables;

use App\Models\issues;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

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

        return $dataTable->addColumn('action', 'issues.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\issues $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(issues $model)
    {
        return $model->with(['category','priority','request'])->newQuery();
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
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
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
            ['data' => 'category.cat_name', 'title' => 'Kategori'],
            ['data' => 'issue_id', 'title' => 'Kode'],
            ['data' => 'priority.prio_name', 'title' => 'Prioritas'],
            ['data' => 'request.name', 'title' => 'Request'],
            ['data' => 'location', 'title' => 'Lokasi'],
            ['data' => 'issue_date', 'title' => 'Waktu Keluhan'],
            ['data' => 'complete_date', 'title' => 'Waktu Selesai'],
            ['data' => 'complete_by', 'title' => 'Selesai Oleh'],
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
