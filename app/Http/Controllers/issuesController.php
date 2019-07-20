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
        $sernum = cat_inventory::with('inventory')->get();
        foreach ($sernum as $key => $value) {
            foreach ($value->inventory as $keys => $val) {
                $sernum[$key]['inventory'][$keys]['sernumid']= $val->sernumid;
            }
        }
        $this->data['sernum'] = $sernum;
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
    public function create()
    {
        $this->data['it_ops'] = User::role('IT Operasional')->pluck('name','id');
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
        $issues = $this->issuesRepository->create($input);
        $kode = $issues->id.$issues->request_id.$this->mytime->format('ymdhis');
        $this->issuesRepository->update(['issue_id'=>$kode], $issues->id);
        $this->notifikasiController->create_notifikasi("KELUHAN", $issues->status,$issues->id);
        if(isset($input['usr'])){
            Alert::success('Ticket Sent Successfully', 'Success')->autoclose(4000);
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

        $this->data['issues'] = $this->issuesRepository->with(['category','priority','request','complete','assign_it_support_relation','assign_it_ops_relation','rating','unit_kerja'])->findWithoutFail($id);
        $this->data['it_support'] = User::role('IT Support')->pluck('name','id');
        $this->data['it_ops'] = User::role('IT Operasional')->pluck('name','id');
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
        if($input['status'] == 'DLITOPS' || $input['status'] == 'DLITSP'){
            $input['waktu_tindakan'] = $this->waktu_sekarang;
        }
        if($input['status'] == 'SLITOPS' || $input['status'] == 'SLITSP'){
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
        $this->notifikasiController->create_notifikasi("KELUHAN", $issues->status,$issues->id);
        if(isset($input['usr'])){
            if($input['usr'] == 'a'){
                Alert::success('Rating Sent Successfully', 'Thank You!')->autoclose(4000);
            }else{
                Alert::success('The issue has finished', 'Thank You!')->autoclose(4000);
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
}
