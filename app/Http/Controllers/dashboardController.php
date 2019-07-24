<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\issues;
use App\Models\priority;
use App\Models\category;
use App\User;
use DB;
use Carbon\Carbon;
class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['jumlah_keluhan'] = issues::get()->count();
        $this->data['jumlah_user'] = User::get()->count();
        $this->data['jumlah_keluhan_selesai'] = issues::where([['status','=','CLOSE']])->orWhere([['status','=','RT']])->get()->count();
        $this->data['jumlah_prioritas'] = priority::leftjoin('issues', 'priority.id', '=', 'issues.prio_id')
        ->select('priority.id', 'priority.prio_name', DB::raw("count(issues.prio_id) as count"))
        ->groupBy('priority.id','priority.prio_name')->get()->toJson();
        $this->data['jumlah_kategori'] = category::leftjoin('issues', 'category.id', '=', 'issues.cat_id')
        ->select('category.id', 'category.cat_name', DB::raw("count(issues.cat_id) as count"))
        ->groupBy('category.id','category.cat_name')->get()->toJson();
        $this->data['jumlah_selesai'] = issues::where([['status','=','CLOSE']])->orWhere([['status','=','RT']])->count();
        $this->data['jumlah_belum'] = issues::where([['status','!=','CLOSE'],['status','!=','RT']])->orWhere('status','=',null)->count();
        $issue = issues::select('id', 'created_at')
                ->get()
                ->groupBy(function($date) {
                    return Carbon::parse($date->created_at)->format('m');
                });

                $issue_count = [];
                $issue_arr = [];

                foreach ($issue as $key => $value) {
                    $issue_count[(int)$key] = count($value);
                }

                for($i = 1; $i <= 12; $i++){
                    if(!empty($issue_count[$i])){
                        $issue_arr[] = $issue_count[$i];
                    }else{
                        $issue_arr[] = 0;
                    }
                }
        $this->data['jumlah_bulan'] = json_encode($issue_arr);
        if ( (int) $this->data['jumlah_belum'] > 0) {
          $this->data['performa'] =number_format(((int) $this->data['jumlah_selesai'] / (int) $this->data['jumlah_keluhan']) * 100, 0, '.', ' ');
        }elseif((int) $this->data['jumlah_selesai'] > 0 && (int) $this->data['jumlah_belum'] == 0){
          $this->data['performa'] = 100;
        }
        else {
          $this->data['performa'] = 0;
        }
        // echo "<pre>";
        // print_r($this->data['jumlah_bulan']);
        return view('dashboard.index')->with($this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
