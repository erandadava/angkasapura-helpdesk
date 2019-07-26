<?php

namespace App\DataTables;

use App\Models\users;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Auth;
use Carbon\Carbon;
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

        return $dataTable->addColumn('action', 'users.datatables_actions')->addColumn('rate_tahun', function($model){
            $rolesnya = $model->model_has_roles->roles->name;
            $dt = \App\Models\users::where('id','=',$model->id)->whereHas('rating', function($q){
                $q->whereYear('created_at', '=', Carbon::now()->year);
            })->first();
            if($dt){
                $rate = 0;
                foreach($dt->rating as $dts){
                    $rate += $dts->rate;
                }
                if(count($dt->rating) != 0){
                    $rate = $rate/count($dt->rating);
                }
                if($rolesnya == 'IT Support' || $rolesnya == 'IT Operasional'){
                    return "<span class='glyphicon glyphicon-star' style='color:orange'></span> ".substr((String)$rate,0,4);
                }
            }
          })->addColumn('rate_bulan', function($model){
            $rolesnya = $model->model_has_roles->roles->name;
            $dt = \App\Models\users::where('id','=',$model->id)->whereHas('rating', function($q){
                $q->whereMonth('created_at', '=', Carbon::now()->month);
            })->first();
            if($dt){
                $rate = 0;
                foreach($dt->rating as $dts){
                    $rate += $dts->rate;
                }
                if(count($dt->rating) != 0){
                    $rate = $rate/count($dt->rating);
                   
                }
                if($rolesnya == 'IT Support' || $rolesnya == 'IT Operasional'){
                    
                    return "<span class='glyphicon glyphicon-star' style='color:orange'></span> ".substr((String)$rate,0,4);
                }
            }
          })->rawColumns(['rate_tahun','rate_bulan','action']);
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
            return $model->with(['model_has_roles.roles','rating'])->where('id','=',$user->id)->newQuery();
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
            ['data' => 'rate_tahun', 'title' => 'Rata Rata Peringkat Tahun Ini', 'searchable' => false],
            ['data' => 'rate_bulan', 'title' => 'Rata Rata Peringkat Bulan Ini', 'searchable' => false],
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
