<?php

namespace App\DataTables;

use App\Models\users;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Auth;
class usersDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'users.datatables_actions')->rawColumns(['ratetahun','ratebulan','action']);;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\users $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(users $model)
    {
        $user = Auth::user();
        $roles = $user->getRoleNames();
        if($roles[0] == "User"){
            return $model->with(['model_has_roles.roles'])->where('id','=',$user->id)->newQuery();
        }
        return $model->with(['model_has_roles.roles'])->newQuery();
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
            ['data' => 'id', 'visible' => false],
            ['data' => 'name', 'title' => 'Nama'],
            ['data' => 'ratetahun', 'title' => 'Rata Rata Peringkat Tahun Ini', 'searchable' => false],
            ['data' => 'ratebulan', 'title' => 'Rata Rata Peringkat Bulan Ini', 'searchable' => false],
            ['data' => 'email', 'title' => 'Email'],
            ['data' => 'model_has_roles.roles.name', 'title' => 'Tugas'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'usersdatatable_' . time();
    }
}
