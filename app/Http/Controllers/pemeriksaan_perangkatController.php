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

        if (empty($pemeriksaanPerangkat)) {
            Flash::error('Pemeriksaan Perangkat not found');

            return redirect(route('pemeriksaanPerangkats.index'));
        }

        $pemeriksaanPerangkat = $this->pemeriksaanPerangkatRepository->update($request->all(), $id);

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
