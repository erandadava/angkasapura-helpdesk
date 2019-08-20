<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\issues;
use App\Models\priority;
use App\Models\category;
use App\User;
use DB;
use Carbon\Carbon;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRole;
use App\Models\inventory;
use App\Models\cat_inventory;

class webuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $roles = $user->getRoleNames();
        $this->data['category'] = category::where('is_active','=',1)->pluck('cat_name','id');
        $this->data['priority'] = priority::where('is_active','=',1)->pluck('prio_name','id');
        $sernum = cat_inventory::with(['inventory' => function ($query) {
            $query->where([['id_pemilik_perangkat', '=', \Auth::id()],['is_active','=',1]]);
        }])->get();

        $check_inventory = inventory::where([['id_pemilik_perangkat', '=', \Auth::id()],['is_active','=',1]])->get();
        if(count($check_inventory) == 0){
            $sernum = cat_inventory::with(with(['inventory' => function ($query) {
                $query->where('is_active','=',1);
            }]))->get();
        }

        foreach ($sernum as $key => $value) {
            foreach ($value->inventory as $keys => $val) {
                $sernum[$key]['inventory'][$keys]['sernum']= $val->sernum;
            }
        }
        
        $this->data['sernum'] = $sernum;
        $this->data['ticket_solution']=issues::with(['category','priority','request','assign_it_support_relation','assign_it_ops_relation'])->where([['request_id','=',$user->id],['status','=','SLITSP']])->orWhere([['status','=','SLITOPS']])->orWhere([['status','=','SLITADM']])->get();
        $this->data['open_ticket']=issues::with(['category','priority','request','assign_it_support_relation','assign_it_ops_relation'])->where([['request_id','=',$user->id],['status','!=','CLOSE'], ['status','!=','RT']])->orWhere([['status','=',null]])->get();
        $this->data['ticket']=issues::with(['category','priority','request'])->where([['request_id','=',$user->id],['status','=','RT']])->orWhere([['request_id','=',$user->id],['status','=','SLITOPS']])->orWhere([['request_id','=',$user->id],['status','=','SLITSP']])->orWhere([['request_id','=',$user->id],['status','=','SLITADM']])->get();
        $this->data['ticket_done']=issues::with(['category','priority','request'])->where([['request_id','=',$user->id],['status','=','CLOSE']])->get();
        
        return view('webuser.konten')->with($this->data);
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
