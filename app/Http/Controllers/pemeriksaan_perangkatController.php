<?php

namespace App\Http\Controllers;

use App\DataTables\pemeriksaan_perangkatDataTable;
use App\Http\Requests;
use App\Http\Requests\Createpemeriksaan_perangkatRequest;
use App\Http\Requests\Updatepemeriksaan_perangkatRequest;
use App\Repositories\pemeriksaan_perangkatRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class pemeriksaan_perangkatController extends AppBaseController
{
    /** @var  pemeriksaan_perangkatRepository */
    private $pemeriksaanPerangkatRepository;

    public function __construct(pemeriksaan_perangkatRepository $pemeriksaanPerangkatRepo)
    {
        $this->pemeriksaanPerangkatRepository = $pemeriksaanPerangkatRepo;
    }

    /**
     * Display a listing of the pemeriksaan_perangkat.
     *
     * @param pemeriksaan_perangkatDataTable $pemeriksaanPerangkatDataTable
     * @return Response
     */
    public function index(pemeriksaan_perangkatDataTable $pemeriksaanPerangkatDataTable)
    {
        return $pemeriksaanPerangkatDataTable->render('pemeriksaan_perangkats.index');
    }

    /**
     * Show the form for creating a new pemeriksaan_perangkat.
     *
     * @return Response
     */
    public function create()
    {
        return view('pemeriksaan_perangkats.create');
    }

    /**
     * Store a newly created pemeriksaan_perangkat in storage.
     *
     * @param Createpemeriksaan_perangkatRequest $request
     *
     * @return Response
     */
    public function store(Createpemeriksaan_perangkatRequest $request)
    {
        $input = $request->all();
        //dd($request->ttd_it_senior);
        if(isset($request->ttd_it_senior)){
            $image = str_replace('data:image/png;base64,', '', $request->ttd_it_senior);
            $image = str_replace(' ', '+', $image);
            $imageName = str_random(10).'.'.'png';
            \Storage::disk('public')->put('ttditsenior/'.$imageName, base64_decode($image));
            $input['ttd_it_senior'] = 'ttditsenior/'.$imageName;
            // $sign = base64_decode($request->ttd_it_senior);
            // $path = "path to file.png";
            // $foto = file_put_contents($path, $sign);
            // $input['ttd_it_senior'] = $foto->store('/ttditsenior');
        }

        if(isset($request->ttd_admin_aps)){
            $image = str_replace('data:image/png;base64,', '', $request->ttd_admin_aps);
            $image = str_replace(' ', '+', $image);
            $imageName = str_random(10).'.'.'png';
            \Storage::disk('public')->put('ttdadminaps/'.$imageName, base64_decode($image));
            $input['ttd_admin_aps'] = 'ttdadminaps/'.$imageName;
            // $sign = base64_decode($request->ttd_it_senior);
            // $path = "path to file.png";
            // $foto = file_put_contents($path, $sign);
            // $input['ttd_it_senior'] = $foto->store('/ttditsenior');
        }

        if(isset($request->ttd_teknisi_aps)){
            $image = str_replace('data:image/png;base64,', '', $request->ttd_teknisi_aps);
            $image = str_replace(' ', '+', $image);
            $imageName = str_random(10).'.'.'png';
            \Storage::disk('public')->put('ttdteknisiaps/'.$imageName, base64_decode($image));
            $input['teknisi_aps'] = 'ttdteknisiaps/'.$imageName;
            // $sign = base64_decode($request->ttd_it_senior);
            // $path = "path to file.png";
            // $foto = file_put_contents($path, $sign);
            // $input['ttd_it_senior'] = $foto->store('/ttditsenior');
        }

        if(isset($request->ttd_user)){
            $image = str_replace('data:image/png;base64,', '', $request->ttd_user);
            $image = str_replace(' ', '+', $image);
            $imageName = str_random(10).'.'.'png';
            \Storage::disk('public')->put('ttduser/'.$imageName, base64_decode($image));
            $input['user'] = 'ttduser/'.$imageName;
            // $sign = base64_decode($request->ttd_it_senior);
            // $path = "path to file.png";
            // $foto = file_put_contents($path, $sign);
            // $input['ttd_it_senior'] = $foto->store('/ttditsenior');
        }

        if(isset($request->ttd_it_non_public)){
            $image = str_replace('data:image/png;base64,', '', $request->ttd_it_non_public);
            $image = str_replace(' ', '+', $image);
            $imageName = str_random(10).'.'.'png';
            \Storage::disk('public')->put('ttditnonpublic/'.$imageName, base64_decode($image));
            $input['it_non_public'] = 'ttditnonpublic/'.$imageName;
            // $sign = base64_decode($request->ttd_it_senior);
            // $path = "path to file.png";
            // $foto = file_put_contents($path, $sign);
            // $input['ttd_it_senior'] = $foto->store('/ttditsenior');
        }


        $pemeriksaanPerangkat = $this->pemeriksaanPerangkatRepository->create($input);

        Flash::success('Pemeriksaan Perangkat saved successfully.');

        return redirect(route('pemeriksaanPerangkats.index'));
    }

    /**
     * Display the specified pemeriksaan_perangkat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pemeriksaanPerangkat = $this->pemeriksaanPerangkatRepository->findWithoutFail($id);

        if (empty($pemeriksaanPerangkat)) {
            Flash::error('Pemeriksaan Perangkat not found');

            return redirect(route('pemeriksaanPerangkats.index'));
        }

        return view('pemeriksaan_perangkats.show')->with('pemeriksaanPerangkat', $pemeriksaanPerangkat);
    }

    /**
     * Show the form for editing the specified pemeriksaan_perangkat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pemeriksaanPerangkat = $this->pemeriksaanPerangkatRepository->findWithoutFail($id);

        if (empty($pemeriksaanPerangkat)) {
            Flash::error('Pemeriksaan Perangkat not found');

            return redirect(route('pemeriksaanPerangkats.index'));
        }

        return view('pemeriksaan_perangkats.edit')->with('pemeriksaanPerangkat', $pemeriksaanPerangkat);
    }

    /**
     * Update the specified pemeriksaan_perangkat in storage.
     *
     * @param  int              $id
     * @param Updatepemeriksaan_perangkatRequest $request
     *
     * @return Response
     */
    public function update($id, Updatepemeriksaan_perangkatRequest $request)
    {
        $pemeriksaanPerangkat = $this->pemeriksaanPerangkatRepository->findWithoutFail($id);
        $input = $request->all();

        if (empty($pemeriksaanPerangkat)) {
            Flash::error('Pemeriksaan Perangkat not found');

            return redirect(route('pemeriksaanPerangkats.index'));
        }


        //dd($request->ttd_it_senior);
        if(isset($request->ttd_it_senior)){
            $image = str_replace('data:image/png;base64,', '', $request->ttd_it_senior);
            $image = str_replace(' ', '+', $image);
            $imageName = str_random(10).'.'.'png';
            \Storage::disk('public')->put('ttditsenior/'.$imageName, base64_decode($image));
            $input['ttd_it_senior'] = 'ttditsenior/'.$imageName;
            // $sign = base64_decode($request->ttd_it_senior);
            // $path = "path to file.png";
            // $foto = file_put_contents($path, $sign);
            // $input['ttd_it_senior'] = $foto->store('/ttditsenior');
        }

        if(isset($request->ttd_admin_aps)){
            $image = str_replace('data:image/png;base64,', '', $request->ttd_admin_aps);
            $image = str_replace(' ', '+', $image);
            $imageName = str_random(10).'.'.'png';
            \Storage::disk('public')->put('ttdadminaps/'.$imageName, base64_decode($image));
            $input['ttd_admin_aps'] = 'ttdadminaps/'.$imageName;
            // $sign = base64_decode($request->ttd_it_senior);
            // $path = "path to file.png";
            // $foto = file_put_contents($path, $sign);
            // $input['ttd_it_senior'] = $foto->store('/ttditsenior');
        }

        if(isset($request->ttd_teknisi_aps)){
            $image = str_replace('data:image/png;base64,', '', $request->ttd_teknisi_aps);
            $image = str_replace(' ', '+', $image);
            $imageName = str_random(10).'.'.'png';
            \Storage::disk('public')->put('ttdteknisiaps/'.$imageName, base64_decode($image));
            $input['teknisi_aps'] = 'ttdteknisiaps/'.$imageName;
            // $sign = base64_decode($request->ttd_it_senior);
            // $path = "path to file.png";
            // $foto = file_put_contents($path, $sign);
            // $input['ttd_it_senior'] = $foto->store('/ttditsenior');
        }

        if(isset($request->ttd_user)){
            $image = str_replace('data:image/png;base64,', '', $request->ttd_user);
            $image = str_replace(' ', '+', $image);
            $imageName = str_random(10).'.'.'png';
            \Storage::disk('public')->put('ttduser/'.$imageName, base64_decode($image));
            $input['user'] = 'ttduser/'.$imageName;
            // $sign = base64_decode($request->ttd_it_senior);
            // $path = "path to file.png";
            // $foto = file_put_contents($path, $sign);
            // $input['ttd_it_senior'] = $foto->store('/ttditsenior');
        }

        if(isset($request->ttd_it_non_public)){
            $image = str_replace('data:image/png;base64,', '', $request->ttd_it_non_public);
            $image = str_replace(' ', '+', $image);
            $imageName = str_random(10).'.'.'png';
            \Storage::disk('public')->put('ttditnonpublic/'.$imageName, base64_decode($image));
            $input['it_non_public'] = 'ttditnonpublic/'.$imageName;
            // $sign = base64_decode($request->ttd_it_senior);
            // $path = "path to file.png";
            // $foto = file_put_contents($path, $sign);
            // $input['ttd_it_senior'] = $foto->store('/ttditsenior');
        }

        $pemeriksaanPerangkat = $this->pemeriksaanPerangkatRepository->update($input, $id);

        Flash::success('Pemeriksaan Perangkat updated successfully.');

        return redirect(route('pemeriksaanPerangkats.index'));
    }

    /**
     * Remove the specified pemeriksaan_perangkat from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pemeriksaanPerangkat = $this->pemeriksaanPerangkatRepository->findWithoutFail($id);

        if (empty($pemeriksaanPerangkat)) {
            Flash::error('Pemeriksaan Perangkat not found');

            return redirect(route('pemeriksaanPerangkats.index'));
        }

        $this->pemeriksaanPerangkatRepository->delete($id);

        Flash::success('Pemeriksaan Perangkat deleted successfully.');

        return redirect(route('pemeriksaanPerangkats.index'));
    }
}
