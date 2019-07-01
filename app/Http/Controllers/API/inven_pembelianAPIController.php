<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createinven_pembelianAPIRequest;
use App\Http\Requests\API\Updateinven_pembelianAPIRequest;
use App\Models\inven_pembelian;
use App\Repositories\inven_pembelianRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class inven_pembelianController
 * @package App\Http\Controllers\API
 */

class inven_pembelianAPIController extends AppBaseController
{
    /** @var  inven_pembelianRepository */
    private $invenPembelianRepository;

    public function __construct(inven_pembelianRepository $invenPembelianRepo)
    {
        $this->invenPembelianRepository = $invenPembelianRepo;
    }

    /**
     * Display a listing of the inven_pembelian.
     * GET|HEAD /invenPembelians
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->invenPembelianRepository->pushCriteria(new RequestCriteria($request));
        $this->invenPembelianRepository->pushCriteria(new LimitOffsetCriteria($request));
        $invenPembelians = $this->invenPembelianRepository->all();

        return $this->sendResponse($invenPembelians->toArray(), 'Inven Pembelians retrieved successfully');
    }

    /**
     * Store a newly created inven_pembelian in storage.
     * POST /invenPembelians
     *
     * @param Createinven_pembelianAPIRequest $request
     *
     * @return Response
     */
    public function store(Createinven_pembelianAPIRequest $request)
    {
        $input = $request->all();

        $invenPembelian = $this->invenPembelianRepository->create($input);

        return $this->sendResponse($invenPembelian->toArray(), 'Inven Pembelian saved successfully');
    }

    /**
     * Display the specified inven_pembelian.
     * GET|HEAD /invenPembelians/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var inven_pembelian $invenPembelian */
        $invenPembelian = $this->invenPembelianRepository->findWithoutFail($id);

        if (empty($invenPembelian)) {
            return $this->sendError('Inven Pembelian not found');
        }

        return $this->sendResponse($invenPembelian->toArray(), 'Inven Pembelian retrieved successfully');
    }

    /**
     * Update the specified inven_pembelian in storage.
     * PUT/PATCH /invenPembelians/{id}
     *
     * @param  int $id
     * @param Updateinven_pembelianAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateinven_pembelianAPIRequest $request)
    {
        $input = $request->all();

        /** @var inven_pembelian $invenPembelian */
        $invenPembelian = $this->invenPembelianRepository->findWithoutFail($id);

        if (empty($invenPembelian)) {
            return $this->sendError('Inven Pembelian not found');
        }

        $invenPembelian = $this->invenPembelianRepository->update($input, $id);

        return $this->sendResponse($invenPembelian->toArray(), 'inven_pembelian updated successfully');
    }

    /**
     * Remove the specified inven_pembelian from storage.
     * DELETE /invenPembelians/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var inven_pembelian $invenPembelian */
        $invenPembelian = $this->invenPembelianRepository->findWithoutFail($id);

        if (empty($invenPembelian)) {
            return $this->sendError('Inven Pembelian not found');
        }

        $invenPembelian->delete();

        return $this->sendResponse($id, 'Inven Pembelian deleted successfully');
    }
}
