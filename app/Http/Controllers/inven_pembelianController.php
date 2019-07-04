<?php

namespace App\Http\Controllers;

use App\DataTables\inven_pembelianDataTable;
use App\Http\Requests;
use App\Http\Requests\Createinven_pembelianRequest;
use App\Http\Requests\Updateinven_pembelianRequest;
use App\Repositories\inven_pembelianRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class inven_pembelianController extends AppBaseController
{
    /** @var  inven_pembelianRepository */
    private $invenPembelianRepository;

    public function __construct(inven_pembelianRepository $invenPembelianRepo)
    {
        $this->invenPembelianRepository = $invenPembelianRepo;
        $this->data['data_unit'] = \App\Models\unit_kerja::pluck('nama_uk','id');
    }

    /**
     * Display a listing of the inven_pembelian.
     *
     * @param inven_pembelianDataTable $invenPembelianDataTable
     * @return Response
     */
    public function index(inven_pembelianDataTable $invenPembelianDataTable)
    {
        return $invenPembelianDataTable->render('inven_pembelians.index');
    }

    /**
     * Show the form for creating a new inven_pembelian.
     *
     * @return Response
     */
    public function create()
    {
        return view('inven_pembelians.create')->with($this->data);
    }

    /**
     * Store a newly created inven_pembelian in storage.
     *
     * @param Createinven_pembelianRequest $request
     *
     * @return Response
     */
    public function store(Createinven_pembelianRequest $request)
    {
        $input = $request->all();

        $invenPembelian = $this->invenPembelianRepository->create($input);

        Flash::success('Inven Pembelian saved successfully.');

        return redirect(route('invenPembelians.index'));
    }

    /**
     * Display the specified inven_pembelian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $invenPembelian = $this->invenPembelianRepository->with('unit_kerjas')->findWithoutFail($id);

        if (empty($invenPembelian)) {
            Flash::error('Inven Pembelian not found');

            return redirect(route('invenPembelians.index'));
        }

        return view('inven_pembelians.show')->with('invenPembelian', $invenPembelian);
    }

    /**
     * Show the form for editing the specified inven_pembelian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $this->data['invenPembelian'] = $this->invenPembelianRepository->findWithoutFail($id);

        if (empty($this->data['invenPembelian'])) {
            Flash::error('Inven Pembelian not found');

            return redirect(route('invenPembelians.index'));
        }

        return view('inven_pembelians.edit')->with($this->data);
    }

    /**
     * Update the specified inven_pembelian in storage.
     *
     * @param  int              $id
     * @param Updateinven_pembelianRequest $request
     *
     * @return Response
     */
    public function update($id, Updateinven_pembelianRequest $request)
    {
        $invenPembelian = $this->invenPembelianRepository->findWithoutFail($id);

        if (empty($invenPembelian)) {
            Flash::error('Inven Pembelian not found');

            return redirect(route('invenPembelians.index'));
        }

        $invenPembelian = $this->invenPembelianRepository->update($request->all(), $id);

        Flash::success('Inven Pembelian updated successfully.');

        return redirect(route('invenPembelians.index'));
    }

    /**
     * Remove the specified inven_pembelian from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $invenPembelian = $this->invenPembelianRepository->findWithoutFail($id);

        if (empty($invenPembelian)) {
            Flash::error('Inven Pembelian not found');

            return redirect(route('invenPembelians.index'));
        }

        $this->invenPembelianRepository->delete($id);

        Flash::success('Inven Pembelian deleted successfully.');

        return redirect(route('invenPembelians.index'));
    }
}
