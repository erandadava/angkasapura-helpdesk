<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createpemeriksaan_perangkatAPIRequest;
use App\Http\Requests\API\Updatepemeriksaan_perangkatAPIRequest;
use App\Models\pemeriksaan_perangkat;
use App\Repositories\pemeriksaan_perangkatRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class pemeriksaan_perangkatController
 * @package App\Http\Controllers\API
 */

class pemeriksaan_perangkatAPIController extends AppBaseController
{
    /** @var  pemeriksaan_perangkatRepository */
    private $pemeriksaanPerangkatRepository;

    public function __construct(pemeriksaan_perangkatRepository $pemeriksaanPerangkatRepo)
    {
        $this->pemeriksaanPerangkatRepository = $pemeriksaanPerangkatRepo;
    }

    /**
     * Display a listing of the pemeriksaan_perangkat.
     * GET|HEAD /pemeriksaanPerangkats
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pemeriksaanPerangkatRepository->pushCriteria(new RequestCriteria($request));
        $this->pemeriksaanPerangkatRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pemeriksaanPerangkats = $this->pemeriksaanPerangkatRepository->all();

        return $this->sendResponse($pemeriksaanPerangkats->toArray(), 'Pemeriksaan Perangkats retrieved successfully');
    }

    /**
     * Store a newly created pemeriksaan_perangkat in storage.
     * POST /pemeriksaanPerangkats
     *
     * @param Createpemeriksaan_perangkatAPIRequest $request
     *
     * @return Response
     */
    public function store(Createpemeriksaan_perangkatAPIRequest $request)
    {
        $input = $request->all();

        $pemeriksaanPerangkat = $this->pemeriksaanPerangkatRepository->create($input);

        return $this->sendResponse($pemeriksaanPerangkat->toArray(), 'Pemeriksaan Perangkat saved successfully');
    }

    /**
     * Display the specified pemeriksaan_perangkat.
     * GET|HEAD /pemeriksaanPerangkats/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var pemeriksaan_perangkat $pemeriksaanPerangkat */
        $pemeriksaanPerangkat = $this->pemeriksaanPerangkatRepository->findWithoutFail($id);

        if (empty($pemeriksaanPerangkat)) {
            return $this->sendError('Pemeriksaan Perangkat not found');
        }

        return $this->sendResponse($pemeriksaanPerangkat->toArray(), 'Pemeriksaan Perangkat retrieved successfully');
    }

    /**
     * Update the specified pemeriksaan_perangkat in storage.
     * PUT/PATCH /pemeriksaanPerangkats/{id}
     *
     * @param  int $id
     * @param Updatepemeriksaan_perangkatAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatepemeriksaan_perangkatAPIRequest $request)
    {
        $input = $request->all();

        /** @var pemeriksaan_perangkat $pemeriksaanPerangkat */
        $pemeriksaanPerangkat = $this->pemeriksaanPerangkatRepository->findWithoutFail($id);

        if (empty($pemeriksaanPerangkat)) {
            return $this->sendError('Pemeriksaan Perangkat not found');
        }

        $pemeriksaanPerangkat = $this->pemeriksaanPerangkatRepository->update($input, $id);

        return $this->sendResponse($pemeriksaanPerangkat->toArray(), 'pemeriksaan_perangkat updated successfully');
    }

    /**
     * Remove the specified pemeriksaan_perangkat from storage.
     * DELETE /pemeriksaanPerangkats/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var pemeriksaan_perangkat $pemeriksaanPerangkat */
        $pemeriksaanPerangkat = $this->pemeriksaanPerangkatRepository->findWithoutFail($id);

        if (empty($pemeriksaanPerangkat)) {
            return $this->sendError('Pemeriksaan Perangkat not found');
        }

        $pemeriksaanPerangkat->delete();

        return $this->sendResponse($id, 'Pemeriksaan Perangkat deleted successfully');
    }
}
