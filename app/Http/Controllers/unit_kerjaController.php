<?php

namespace App\Http\Controllers;

use App\DataTables\unit_kerjaDataTable;
use App\Http\Requests;
use App\Http\Requests\Createunit_kerjaRequest;
use App\Http\Requests\Updateunit_kerjaRequest;
use App\Repositories\unit_kerjaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class unit_kerjaController extends AppBaseController
{
    /** @var  unit_kerjaRepository */
    private $unitKerjaRepository;

    public function __construct(unit_kerjaRepository $unitKerjaRepo)
    {
        $this->unitKerjaRepository = $unitKerjaRepo;
    }

    /**
     * Display a listing of the unit_kerja.
     *
     * @param unit_kerjaDataTable $unitKerjaDataTable
     * @return Response
     */
    public function index(unit_kerjaDataTable $unitKerjaDataTable)
    {
        return $unitKerjaDataTable->render('unit_kerjas.index');
    }

    /**
     * Show the form for creating a new unit_kerja.
     *
     * @return Response
     */
    public function create()
    {
        return view('unit_kerjas.create');
    }

    /**
     * Store a newly created unit_kerja in storage.
     *
     * @param Createunit_kerjaRequest $request
     *
     * @return Response
     */
    public function store(Createunit_kerjaRequest $request)
    {
        $input = $request->all();

        $unitKerja = $this->unitKerjaRepository->create($input);

        Flash::success('Unit Kerja saved successfully.');

        return redirect(route('unitKerjas.index'));
    }

    /**
     * Display the specified unit_kerja.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $unitKerja = $this->unitKerjaRepository->findWithoutFail($id);

        if (empty($unitKerja)) {
            Flash::error('Unit Kerja not found');

            return redirect(route('unitKerjas.index'));
        }

        return view('unit_kerjas.show')->with('unitKerja', $unitKerja);
    }

    /**
     * Show the form for editing the specified unit_kerja.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $unitKerja = $this->unitKerjaRepository->findWithoutFail($id);

        if (empty($unitKerja)) {
            Flash::error('Unit Kerja not found');

            return redirect(route('unitKerjas.index'));
        }

        return view('unit_kerjas.edit')->with('unitKerja', $unitKerja);
    }

    /**
     * Update the specified unit_kerja in storage.
     *
     * @param  int              $id
     * @param Updateunit_kerjaRequest $request
     *
     * @return Response
     */
    public function update($id, Updateunit_kerjaRequest $request)
    {
        $unitKerja = $this->unitKerjaRepository->findWithoutFail($id);

        if (empty($unitKerja)) {
            Flash::error('Unit Kerja not found');

            return redirect(route('unitKerjas.index'));
        }

        $unitKerja = $this->unitKerjaRepository->update($request->all(), $id);

        Flash::success('Unit Kerja updated successfully.');

        return redirect(route('unitKerjas.index'));
    }

    /**
     * Remove the specified unit_kerja from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $unitKerja = $this->unitKerjaRepository->findWithoutFail($id);

        if (empty($unitKerja)) {
            Flash::error('Unit Kerja not found');

            return redirect(route('unitKerjas.index'));
        }

        $this->unitKerjaRepository->delete($id);

        Flash::success('Unit Kerja deleted successfully.');

        return redirect(route('unitKerjas.index'));
    }
}
