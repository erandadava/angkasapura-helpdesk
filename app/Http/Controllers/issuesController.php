<?php

namespace App\Http\Controllers;

use App\DataTables\issuesDataTable;
use App\DataTables\penilaianDataTable;
use App\DataTables\issuescloseDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateissuesRequest;
use App\Http\Requests\UpdateissuesRequest;
use App\Repositories\issuesRepository;
use App\Models\category;
use App\Models\priority;
use Illuminate\Http\Request;
use App\User;
use Flash;
use App\Http\Controllers\AppBaseController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRole;
use App\Http\Controllers\notifikasiController;
use Response;
use Carbon;
use Auth;
use App\Repositories\ratingRepository;
use App\Models\issues;
use App\DataTables\laporanDataTable;
use App\DataTables\laporanhariDataTable;
use App\Models\inventory;
use App\Models\cat_inventory;
use Alert;
use DB;
class issuesController extends AppBaseController
{
    /** @var  issuesRepository */
    private $issuesRepository;
    private $notifikasiController;

    public function __construct(issuesRepository $issuesRepo, notifikasiController $notifikasiControl, ratingRepository $ratingRepo)
    {
        $this->issuesRepository = $issuesRepo;
        $this->notifikasiController = $notifikasiControl;
        $this->ratingRepository = $ratingRepo;
        $this->mytime = Carbon\Carbon::now();
        $this->waktu_sekarang = $this->mytime->toDateTimeString();
        $this->data['category'] = category::where('is_active','=',1)->pluck('cat_name','id');
        $this->data['priority'] = priority::where('is_active','=',1)->pluck('prio_name','id');
        $this->data['data_user'] = \App\User::role('User')->pluck('name','id');
        $this->data['data_unit'] = \App\Models\unit_kerja::pluck('nama_uk','id');

        // echo "<pre>";
        // return print_r($this->data['sernum']);
    }

    /**
     * Display a listing of the issues.
     *
     * @param issuesDataTable $issuesDataTable
     * @return Response
     */
    public function index(issuesDataTable $issuesDataTable, penilaianDataTable $penilaianDataTable,Request $request)
    {
        if($request->n){
            return $this->notifikasiController->update_baca($request->n);
        }
        if($request->p){
            return $penilaianDataTable->render('issues.indexpenilaian');;
        }
        return $issuesDataTable->render('issues.index');
    }

    /**
     * Show the form for creating a new issues.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        // $this->data['it_ops'] = User::role('IT Operasional')->pluck('name','id');
        if(Auth::check()){
            $user = Auth::user();
            $roles = $user->getRoleNames();
            if(($roles[0] == "IT Administrator") || ($roles[0] == "IT Support" && $request->status_jam == 1)){
                    $get_petugas = User::whereHas("roles", function($q){ $q->where("name", "IT Administrator")->orWhere("name", "IT Support"); })->get()->sortBy(function ($user, $key) {
                    return $user->roles->pluck('id')->min();
                });
            }elseif($roles[0] == "IT Non Public"){
                    $get_petugas = User::whereHas("roles", function($q){ $q->where("name", "IT Administrator")->orWhere("name", "IT Support")->orWhere("name", "IT Support")->orWhere("name", "IT Operasional"); })->get()->sortBy(function ($user, $key) {
                    return $user->roles->pluck('id')->min();
                });
            }
        }
        $this->data['petugas'] =[];
        if(isset($get_petugas)){
            foreach ($get_petugas as $key => $value) {
                $this->data['petugas'][$value['id']] = $value['name'].' | '.$value['roles'][0]['name'];
            }
        }
        return view('issues.create')->with($this->data);
    }

    /**
     * Store a newly created issues in storage.
     *
     * @param CreateissuesRequest $request
     *
     * @return Response
     */
    public function store(CreateissuesRequest $request)
    {
        $input = $request->all();
        $input['issue_date'] = $this->waktu_sekarang;

        if($request->untuk_user){
            $input['request_id'] = $request->request_id_user;
        }

        if($request->assign_petugas){
            $user = User::where('id','=',$request->assign_petugas)->first();
            $roles = $user->getRoleNames();
            if($roles[0] == "IT Administrator"){
                $input['status'] = 'ITADM';
                $input['assign_it_admin'] = $request->assign_petugas;
            }elseif($roles[0] == "IT Support"){
                $input['status'] = 'ITSP';
                $input['assign_it_support'] = $request->assign_petugas;
            }else{
                $input['status'] = 'ITOPS';
                $input['assign_it_ops'] = $request->assign_petugas;
            }
        }

        $issues = $this->issuesRepository->create($input);
        $kode = $issues->id.$issues->request_id.$this->mytime->format('ymdhis');
        $this->issuesRepository->update(['issue_id'=>$kode], $issues->id);
        $this->notifikasiController->create_notifikasi("KELUHAN", $issues->status,$issues->id,$issues->request_id);
        if(isset($input['usr'])){
            Alert::success('Tiket Berhasil Dikirim', 'Sukses')->autoclose(4000);
            return redirect('/beranda');
        }

        Flash::success('Issues saved successfully.');


        return redirect(route('issues.index'));
    }

    /**
     * Display the specified issues.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id, Request $request)
    {
        if($request->n){
            $this->notifikasiController->update_baca($request->n);
        }

        $this->data['issues'] = $this->issuesRepository->with(['category','priority','request','complete','assign_it_support_relation','assign_it_ops_relation','assign_it_admin_relation','rating','unit_kerja'])->findWithoutFail($id);
        $this->data['it_support'] = User::role('IT Support')->pluck('name','id');
        $this->data['it_ops'] = User::role('IT Operasional')->pluck('name','id');
        $this->data['it_admin'] = User::role('IT Administrator')->pluck('name','id');
        if (empty($this->data['issues'])) {
            Flash::error('Issues not found');

            return redirect(route('issues.index'));
        }

        return view('issues.show')->with($this->data);
    }

    /**
     * Show the form for editing the specified issues.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $this->data['issues'] = $this->issuesRepository->findWithoutFail($id);

        if (empty($this->data['issues'])) {
            Flash::error('Issues not found');

            return redirect(route('issues.index'));
        }

        return view('issues.edit')->with($this->data);
    }

    /**
     * Update the specified issues in storage.
     *
     * @param  int              $id
     * @param UpdateissuesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateissuesRequest $request)
    {
        $issues = $this->issuesRepository->findWithoutFail($id);

        if (empty($issues)) {
            Flash::error('Issues not found');

            return redirect(route('issues.index'));
        }
        $input = $request->all();

        if($input['status'] == 'CLOSE'){
            $input['complete_date'] = $this->waktu_sekarang;
        }
        if($input['status'] == 'DLITOPS' || $input['status'] == 'DLITSP' || $input['status'] == 'DLITADM'){
            $input['waktu_tindakan'] = $this->waktu_sekarang;
        }
        if($input['status'] == 'SLITOPS' || $input['status'] == 'SLITSP' || $input['status'] == 'SLITADM'){
            $input['complete_by'] = \Auth::User()->id;
            $input['solution_date'] = $this->waktu_sekarang;
        }
        $issues = $this->issuesRepository->update($input, $id);

        if(isset($input['rate'])){
            $input['user_id'] =  \Auth::User()->id;
            $input['issues_id'] =  $issues->id;
            $input['target_id'] =  $issues->complete_by;
            $rating = $this->ratingRepository->create($input);
        }
        $this->notifikasiController->create_notifikasi("KELUHAN", $issues->status,$issues->id, $issues->request_id);
        if(isset($input['usr'])){
            if($input['usr'] == 'a'){
                Alert::success('Penilain Berhasil Dikirim', 'Terima Kasih')->autoclose(4000);
            }else{
                Alert::success('Keluhan Telah Selesai', 'Terima Kasih telah memberikan nilai')->autoclose(4000);
            }
            return redirect('/beranda');
        }
        Flash::success('Issues updated successfully.');

        return redirect(route('issues.index'));
    }

    /**
     * Remove the specified issues from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $issues = $this->issuesRepository->findWithoutFail($id);

        if (empty($issues)) {
            Flash::error('Issues not found');

            return redirect(route('issues.index'));
        }

        $this->issuesRepository->delete($id);

        Flash::success('Issues deleted successfully.');

        return redirect(route('issues.index'));
    }

    public function historyticket(issuescloseDataTable $issuescloseDataTable, Request $request)
    {

        // return $this->notifikasiController->update_baca($request->n);
        return $issuescloseDataTable->render('issues.index');
    }

    public function laporan(laporanDataTable $laporanDataTable, Request $request)
    {
        return $laporanDataTable->render('laporans.index');
    }

    public function laporan_hari(laporanhariDataTable $laporanhariDataTable, Request $request)
    {
        return $laporanhariDataTable->render('laporans.laporanhari');
    }

    public function get_sernum($id){
        $user = \App\User::find($id);
        $roles = $user->getRoleNames();
        if($roles[0] == "User"){
            $sernum = cat_inventory::with(['inventory' => function ($query) use ($id){
                $query->where([['id_pemilik_perangkat', '=', $id],['is_active','=',1]]);
            }])->get();
    
            $check_inventory = inventory::where([['id_pemilik_perangkat', '=', $id],['is_active','=',1]])->get();
            if(count($check_inventory) == 0){
                $sernum = cat_inventory::with(with(['inventory' => function ($query) {
                    $query->where('is_active','=',1);
                }]))->get();
            }
        }elseif($roles[0] == "IT Non Public"){
            $sernum = cat_inventory::with(['inventory' => function ($query) use ($id){
                $query->where([['id_pemilik_perangkat', '=', $id],['is_active','=',1]]);
            }])->withCount(['inventory' => function ($query) use ($id){
                $query->where([['id_pemilik_perangkat', '=', $id],['is_active','=',1]]);
            }])->get();

            $status_sernum = false;
            foreach ($sernum as $key => $value) {
                if($value->inventory_count != 0){
                    $status_sernum = true;
                }
            }

            if($status_sernum==false){
                $sernum = cat_inventory::with(['inventory' => function ($query) use ($id){
                    $query->where([['id_pemilik_perangkat', '!=', $id],['is_active','=',1]]);
                }])->get();
            }else{
                $sernum2 = cat_inventory::with(['inventory' => function ($query) use ($id){
                    $query->where([['id_pemilik_perangkat', '!=', $id],['is_active','=',1]])->orWhere([['id_pemilik_perangkat', '=', null],['is_active','=',1]]);
                }])->get();
            }
            

            $check_inventory = inventory::where([['id_pemilik_perangkat', '=', $id],['is_active','=',1]])->get();
            if(count($check_inventory) == 0){
                $sernum = cat_inventory::with(with(['inventory' => function ($query) {
                    $query->where('is_active','=',1);
                }]))->get();
            }
        }
        else{
            $sernum = cat_inventory::with(with(['inventory' => function ($query) {
                $query->where('is_active','=',1);
            }]))->get();
        } 

        foreach ($sernum as $key => $value) {
            foreach ($value->inventory as $keys => $val) {
                $sernum[$key]['inventory'][$keys]['sernum']= $val->sernum;
            }
        }

        if(isset($sernum2)){
            foreach ($sernum2 as $key => $value) {
                foreach ($value->inventory as $keys => $val) {
                    $sernum2[$key]['inventory'][$keys]['sernum']= $val->sernum;
                }
            }
        }

        $hasil = [];
        $oldkey = 0;
        $oldkeys = 0;
        foreach($sernum as $key => $val){
            $oldkey=$key;
            if(isset($sernum2)){
                $hasil[$key]['text'] = $val->nama_cat.' - IT Non Public';
            }else{
                $hasil[$key]['text'] = $val->nama_cat;
            }
            
            foreach($val->inventory as $keys =>  $dt){
                $oldkeys=$keys;
                 $hasil[$key]['children'][$keys] = ['id' => $dt->id,'text'=>$dt->sernumid];
            }

            if(count($val->inventory)==0){
                $hasil[$key]['children'][0] = [];
            }
        }

        if(isset($sernum2)){
            
            foreach($sernum2 as $key => $val){
                $oldkey++;
                $hasil[$oldkey]['text'] = $val->nama_cat;
                foreach($val->inventory as $keys =>  $dt){
                     $hasil[$oldkey]['children'][$keys] = ['id' => $dt->id,'text'=>$dt->sernumid];
                }

                if(count($val->inventory)==0){
                    $hasil[$key]['children'][0] = [];
                }
            }
        }

        
        return $this->sendResponse($hasil, 'Get Sernum retrieved successfully');
    }
}
