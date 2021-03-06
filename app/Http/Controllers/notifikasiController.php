<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatenotifikasiRequest;
use App\Http\Requests\UpdatenotifikasiRequest;
use App\Repositories\notifikasiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use \App\Models\issues;
use \App\User;
use \App\Models\notifikasi;
use Illuminate\Support\Facades\Crypt;
use Auth;
use Carbon\Carbon;

class notifikasiController extends AppBaseController
{
    /** @var  notifikasiRepository */
    private $notifikasiRepository;

    public function __construct(notifikasiRepository $notifikasiRepo)
    {
        $this->notifikasiRepository = $notifikasiRepo;
    }

    /**
     * Display a listing of the notifikasi.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->notifikasiRepository->pushCriteria(new RequestCriteria($request));
        $notifikasis = $this->notifikasiRepository->all();

        return view('notifikasis.index')
            ->with('notifikasis', $notifikasis);
    }

    /**
     * Show the form for creating a new notifikasi.
     *
     * @return Response
     */
    public function create()
    {
        return view('notifikasis.create');
    }

    /**
     * Store a newly created notifikasi in storage.
     *
     * @param CreatenotifikasiRequest $request
     *
     * @return Response
     */
    public function create_notifikasi($tipe, $status, $id_konten, $permintaan)
    {


        if($tipe == 'KELUHAN'){
            $input['status'] = $tipe;
            $input['konten_id'] = $id_konten;
            $keluhan = issues::find($id_konten);
            $name = User::find($permintaan);
            // dd($permintaan);
            // $id_konten = Crypt::encrypt($id_konten);
            $link = "/issues";
            switch ($status) {
                case 'ITADM':
                    $input['pesan'] = "<p><span class='label label-danger'>Keluhan baru</span> dari $name->name dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = $keluhan->assign_it_admin;
                    $notifikasi = $this->notifikasiRepository->create($input);
                    $input['link_id'] = $link.'/'.$id_konten.'?n='.Crypt::encrypt($notifikasi->id);
                    $this->notifikasiRepository->update($input, $notifikasi->id);
                    $input['pesan'] = "<p><span class='label label-info'>Keluhan Diteruskan ke IT Administrator</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = $keluhan->request_id;
                    break;
                case 'ITSP':
                    $input['pesan'] = "<p><span class='label label-danger'>Keluhan baru</span> dari $name->name dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = $keluhan->assign_it_support;
                    $notifikasi = $this->notifikasiRepository->create($input);
                    $input['link_id'] = $link.'/'.$id_konten.'?n='.Crypt::encrypt($notifikasi->id);
                    $this->notifikasiRepository->update($input, $notifikasi->id);
                    $input['pesan'] = "<p><span class='label label-info'>Keluhan Diteruskan ke IT Support</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = $keluhan->request_id;
                    break;
                case 'ITOPS':
                    $input['pesan'] = "<p><span class='label label-danger'>Keluhan baru</span> dari $name->name dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = $keluhan->assign_it_ops;
                    $notifikasi = $this->notifikasiRepository->create($input);
                    $input['link_id'] = $link.'/'.$id_konten.'?n='.Crypt::encrypt($notifikasi->id);
                    $this->notifikasiRepository->update($input, $notifikasi->id);
                    $input['pesan'] = "<p><span class='label label-warning'>Menunggu Solusi Dari IT OPS</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = $keluhan->request_id;
                    break;

                case 'LITADM':
                    $input['pesan'] = "<p><span class='label label-info'>IT Administrator Menuju ke Lokasi</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = $keluhan->request_id;
                    break;
                case 'DLITADM':
                    $input['pesan'] = "<p><span class='label label-warning'>Sedang Dalam Tindakan IT Administrator</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = $keluhan->request_id;
                    break;
                case 'SLITADM':
                    $input['pesan'] = "<p><span class='label label-success'>Solusi Telah Diberikan IT Administrator</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = $keluhan->request_id;
                    break;

                case 'LITOPS':
                    $input['pesan'] = "<p><span class='label label-info'>IT OPS Menuju ke Lokasi</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = $keluhan->request_id;
                    break;
                case 'DLITOPS':
                    $input['pesan'] = "<p><span class='label label-warning'>Sedang Dalam Tindakan IT OPS</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = $keluhan->request_id;
                    break;
                case 'SLITOPS':
                    $input['pesan'] = "<p><span class='label label-success'>Solusi Telah Diberikan IT OPS</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = $keluhan->request_id;
                    break;
                
                case 'LITSP':
                    $input['pesan'] = "<p><span class='label label-info'>IT Support Menuju ke Lokasi</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = $keluhan->request_id;
                    break;
                case 'DLITSP':
                    $input['pesan'] = "<p><span class='label label-warning'>Sedang Dalam Tindakan IT Support</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = $keluhan->request_id;
                    break;
                case 'SLITSP':
                    $input['pesan'] = "<p><span class='label label-success'>Solusi Telah Diberikan IT Suppot</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = $keluhan->request_id;
                    break;
                case 'CLOSE':
                    // if($keluhan->assign_it_ops != null && $keluhan->complete_by == $keluhan->assign_it_ops){
                    //     $input['pesan'] = "<p><span class='label label-info'>Berikan Rating</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    //     $input['user_id'] =  $keluhan->request_id;
                    //     $notifikasi = $this->notifikasiRepository->create($input);
                    //     $input['link_id'] = $link.'/'.$id_konten.'?n='.Crypt::encrypt($notifikasi->id);
                    //     $this->notifikasiRepository->update($input, $notifikasi->id);
                    // }
                    //Check issue dari it non public atau bukan
                    if($keluhan->assign_it_support != null && $keluhan->complete_by == $keluhan->assign_it_support){
                        $input['pesan'] = "<p><span class='label label-success'>Keluhan Selesai</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                        $input['user_id'] = $keluhan->assign_it_support;
                    }
                    if($keluhan->assign_it_ops != null && $keluhan->complete_by == $keluhan->assign_it_ops){
                        $input['pesan'] = "<p><span class='label label-success'>Keluhan Selesai</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                        $input['user_id'] = $keluhan->assign_it_ops;
                    }
                    if($keluhan->assign_it_admin != null && $keluhan->complete_by == $keluhan->assign_it_admin){
                        $input['pesan'] = "<p><span class='label label-success'>Keluhan Selesai</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                        $input['user_id'] = $keluhan->assign_it_admin;
                    }
                    break;
                case 'RT':
                    //Check issue dari it non public atau bukan
                    $check_non = \App\Models\issues::where('id','=',$id_konten)->first();
                    $hasil_check = \App\User::where('id',$check_non->request_id)->with('roles')->first();
                    
                    $input['pesan'] = "<p><span class='label label-success'>Rating dari ".$hasil_check->name .'-'. $hasil_check->roles[0]['name']??''."</span><small><b>$keluhan->issue_id</b></small></p>"; 
                    $input['user_id'] = $keluhan->complete_by;

                    break;
                case 'RITSP':
                    $input['pesan'] = "<p><span class='label label-danger'>Tiket diteruskan ke IT Operasional</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = null;
                    $notifikasi = $this->notifikasiRepository->create($input);
                    $input['link_id'] = $link.'/'.$id_konten.'?n='.Crypt::encrypt($notifikasi->id);
                    $this->notifikasiRepository->update($input, $notifikasi->id);
                    $input['pesan'] = "<p><span class='label label-danger'>Tiket diteruskan ke IT Operasional</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = $keluhan->request_id;
                    break;
                case 'RITADM':
                    $input['pesan'] = "<p><span class='label label-danger'> Tiket diteruskan ke IT Operasional</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = null;
                    $notifikasi = $this->notifikasiRepository->create($input);
                    $input['link_id'] = $link.'/'.$id_konten.'?n='.Crypt::encrypt($notifikasi->id);
                    $this->notifikasiRepository->update($input, $notifikasi->id);
                    $input['pesan'] = "<p><span class='label label-danger'> Tiket diteruskan ke IT Operasional</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = $keluhan->request_id;
                    break;
                default:
                    $input['pesan'] = "<p><span class='label label-danger'>Keluhan baru</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = null;
                    break;
            }
        }

        //Untuk update notifikasi menjadi terbaca jika status close
        if ($status == 'CLOSE') {
            $temp_notif = \App\Models\notifikasi::where([['konten_id','=',$id_konten],['status_baca','=',0],['status','=','KELUHAN']])->update(['status_baca' => 1]);
        }
        
        $notifikasi = $this->notifikasiRepository->create($input);
        $input['link_id'] = $link.'/'.$id_konten.'?n='.Crypt::encrypt($notifikasi->id);
        $this->notifikasiRepository->update($input, $notifikasi->id);

        if($status == 'CLOSE'){
            //Untuk rating
            $check_non = \App\Models\issues::where('id','=',$id_konten)->first();
            $hasil_check = \App\User::where('id',$check_non->request_id)->with('roles')->first();
            $user_role = $hasil_check->roles[0]['name']??'';
            $input['pesan'] = "<p><span class='label label-success'>Rating dari ".$hasil_check->name .' - '.$user_role."</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>"; 
            $input['user_id'] = $keluhan->complete_by;
            $notifikasi = $this->notifikasiRepository->create($input);
            $input['link_id'] = $link.'/'.$id_konten.'?n='.Crypt::encrypt($notifikasi->id);
            $this->notifikasiRepository->update($input, $notifikasi->id);
        }

        return $notifikasi;
    }

    /**
     * Display the specified notifikasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $notifikasi = $this->notifikasiRepository->findWithoutFail($id);

        if (empty($notifikasi)) {
            Flash::error('Notifikasi not found');

            return redirect(route('notifikasis.index'));
        }

        return view('notifikasis.show')->with('notifikasi', $notifikasi);
    }

    /**
     * Show the form for editing the specified notifikasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $notifikasi = $this->notifikasiRepository->findWithoutFail($id);

        if (empty($notifikasi)) {
            Flash::error('Notifikasi not found');

            return redirect(route('notifikasis.index'));
        }

        return view('notifikasis.edit')->with('notifikasi', $notifikasi);
    }

    /**
     * Update the specified notifikasi in storage.
     *
     * @param  int              $id
     * @param UpdatenotifikasiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatenotifikasiRequest $request)
    {
        $notifikasi = $this->notifikasiRepository->findWithoutFail($id);

        if (empty($notifikasi)) {
            Flash::error('Notifikasi not found');

            return redirect(route('notifikasis.index'));
        }

        $notifikasi = $this->notifikasiRepository->update($request->all(), $id);

        Flash::success('Notifikasi updated successfully.');

        return redirect(route('notifikasis.index'));
    }

    public function update_baca($id)
    {
        $id = Crypt::decrypt($id);
        $notifikasi = $this->notifikasiRepository->findWithoutFail($id);

        $input['status_baca'] = 1;
        $notifikasi = \App\Models\notifikasi::where([['user_id','=',$notifikasi->user_id],['konten_id','=',$notifikasi->konten_id],['status_baca','=',0],['status','=','KELUHAN']])->update($input);

        return $notifikasi;
    }


    /**
     * Remove the specified notifikasi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $notifikasi = $this->notifikasiRepository->findWithoutFail($id);

        if (empty($notifikasi)) {
            Flash::error('Notifikasi not found');

            return redirect(route('notifikasis.index'));
        }

        $this->notifikasiRepository->delete($id);

        Flash::success('Notifikasi deleted successfully.');

        return redirect(route('notifikasis.index'));
    }

    public function realtime_notification(Request $request){
        if(isset(Auth::user()->id)){
            $usernya = Auth::user()->getRoleNames();
            if(($usernya[0] == "IT Administrator") || ($usernya[0] == "IT Support" && $request->status_jam == 1)){
                $this->data['data_notif'] = notifikasi::where([['user_id','=',null],['status_baca','=',0]])->orWhere([['user_id','=',Auth::user()->id],['status_baca','=',0]])->latest()->get();
            }else{
                $this->data['data_notif'] = notifikasi::where([['user_id','=',Auth::user()->id],['status_baca','=',0]])->latest()->get();
            }
            
            $this->data['count_notif'] = $this->data['data_notif']->count();
            
            return $this->sendResponse($this->data, 'Notifikasi send successfully');
        } 
    }
}
