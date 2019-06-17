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
use Illuminate\Support\Facades\Crypt;

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
    public function create_notifikasi($tipe, $status, $id_konten)
    {


        if($tipe == 'KELUHAN'){
            $input['status'] = $tipe;
            $input['konten_id'] = $id_konten;
            $keluhan = issues::find($id_konten);
            // $id_konten = Crypt::encrypt($id_konten);
            $link = "/issues";
            switch ($status) {
                case 'ITSP':
                    $input['pesan'] = "<p><span class='label label-danger'>Keluhan baru</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = $keluhan->assign_it_support;
                    $notifikasi = $this->notifikasiRepository->create($input);
                    $input['link_id'] = $link.'/'.$id_konten.'?n='.Crypt::encrypt($notifikasi->id);
                    $this->notifikasiRepository->update($input, $notifikasi->id);
                    $input['pesan'] = "<p><span class='label label-info'>Keluhan Diteruskan ke IT Support</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = $keluhan->request_id;
                    break;
                case 'ITOPS':
                    $input['pesan'] = "<p><span class='label label-danger'>Keluhan baru</span> dengan nomor keluhan <b>$keluhan->issue_id.'</b></p>";
                    $input['user_id'] = $keluhan->assign_it_ops;
                    $notifikasi = $this->notifikasiRepository->create($input);
                    $input['link_id'] = $link.'/'.$id_konten.'?n='.Crypt::encrypt($notifikasi->id);
                    $this->notifikasiRepository->update($input, $notifikasi->id);
                    $input['pesan'] = "<p><span class='label label-warning'>Menunggu Solusi Dari IT OPS</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = $keluhan->request_id;
                    break;
                case 'CLOSE':
                    $input['pesan'] = "<p><span class='label label-success'>Keluhan Ditutup</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = $keluhan->request_id;
                    break;
                case 'RT':
                    if($keluhan->assign_it_ops != null && $keluhan->complete_by == $keluhan->assign_it_ops){
                        $input['pesan'] = "<p><span class='label label-success'>Rating dari IT Administrator</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    }else{
                        $input['pesan'] = "<p><span class='label label-success'>Rating dari User</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>"; 
                    }
                    $input['user_id'] = $keluhan->complete_by;
                    break;
                default:
                    $input['pesan'] = "<p><span class='label label-danger'>Keluhan baru</span> dengan nomor keluhan <b>$keluhan->issue_id</b></p>";
                    $input['user_id'] = null;
                    break;
            }
        }

        $notifikasi = $this->notifikasiRepository->create($input);
        $input['link_id'] = $link.'/'.$id_konten.'?n='.Crypt::encrypt($notifikasi->id);
        $this->notifikasiRepository->update($input, $notifikasi->id);

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
        $notifikasi = $this->notifikasiRepository->update($input, $id);

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
}
