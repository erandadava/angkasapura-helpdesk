<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createunit_kerjaAPIRequest;
use App\Http\Requests\API\Updateunit_kerjaAPIRequest;
use App\Models\unit_kerja;
use App\Repositories\unit_kerjaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class unit_kerjaController
 * @package App\Http\Controllers\API
 */

class unit_kerjaAPIController extends AppBaseController
{
    /** @var  unit_kerjaRepository */
    private $unitKerjaRepository;

    public function __construct(unit_kerjaRepository $unitKerjaRepo)
    {
        $this->unitKerjaRepository = $unitKerjaRepo;
    }

    /**
     * Display a listing of the unit_kerja.
     * GET|HEAD /unitKerjas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->unitKerjaRepository->pushCriteria(new RequestCriteria($request));
        $this->unitKerjaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $unitKerjas = $this->unitKerjaRepository->all();

        return $this->sendResponse($unitKerjas->toArray(), 'Unit Kerjas retrieved successfully');
    }

    /**
     * Store a newly created unit_kerja in storage.
     * POST /unitKerjas
     *
     * @param Createunit_kerjaAPIRequest $request
     *
     * @return Response
     */
    public function store(Createunit_kerjaAPIRequest $request)
    {
        $input = $request->all();

        $unitKerja = $this->unitKerjaRepository->create($input);

        return $this->sendResponse($unitKerja->toArray(), 'Unit Kerja saved successfully');
    }

    /**
     * Display the specified unit_kerja.
     * GET|HEAD /unitKerjas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var unit_kerja $unitKerja */
        $unitKerja = $this->unitKerjaRepository->findWithoutFail($id);

        if (empty($unitKerja)) {
            return $this->sendError('Unit Kerja not found');
        }

        return $this->sendResponse($unitKerja->toArray(), 'Unit Kerja retrieved successfully');
    }

    /**
     * Update the specified unit_kerja in storage.
     * PUT/PATCH /unitKerjas/{id}
     *
     * @param  int $id
     * @param Updateunit_kerjaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateunit_kerjaAPIRequest $request)
    {
        $input = $request->all();

        /** @var unit_kerja $unitKerja */
        $unitKerja = $this->unitKerjaRepository->findWithoutFail($id);

        if (empty($unitKerja)) {
            return $this->sendError('Unit Kerja not found');
        }

        $unitKerja = $this->unitKerjaRepository->update($input, $id);

        return $this->sendResponse($unitKerja->toArray(), 'unit_kerja updated successfully');
    }

    /**
     * Remove the specified unit_kerja from storage.
     * DELETE /unitKerjas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var unit_kerja $unitKerja */
        $unitKerja = $this->unitKerjaRepository->findWithoutFail($id);

        if (empty($unitKerja)) {
            return $this->sendError('Unit Kerja not found');
        }

        $unitKerja->delete();

        return $this->sendResponse($id, 'Unit Kerja deleted successfully');
    }
}
