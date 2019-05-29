<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatenotifikasiAPIRequest;
use App\Http\Requests\API\UpdatenotifikasiAPIRequest;
use App\Models\notifikasi;
use App\Repositories\notifikasiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class notifikasiController
 * @package App\Http\Controllers\API
 */

class notifikasiAPIController extends AppBaseController
{
    /** @var  notifikasiRepository */
    private $notifikasiRepository;

    public function __construct(notifikasiRepository $notifikasiRepo)
    {
        $this->notifikasiRepository = $notifikasiRepo;
    }

    /**
     * Display a listing of the notifikasi.
     * GET|HEAD /notifikasis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->notifikasiRepository->pushCriteria(new RequestCriteria($request));
        $this->notifikasiRepository->pushCriteria(new LimitOffsetCriteria($request));
        $notifikasis = $this->notifikasiRepository->all();

        return $this->sendResponse($notifikasis->toArray(), 'Notifikasis retrieved successfully');
    }

    /**
     * Store a newly created notifikasi in storage.
     * POST /notifikasis
     *
     * @param CreatenotifikasiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatenotifikasiAPIRequest $request)
    {
        $input = $request->all();

        $notifikasi = $this->notifikasiRepository->create($input);

        return $this->sendResponse($notifikasi->toArray(), 'Notifikasi saved successfully');
    }

    /**
     * Display the specified notifikasi.
     * GET|HEAD /notifikasis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var notifikasi $notifikasi */
        $notifikasi = $this->notifikasiRepository->findWithoutFail($id);

        if (empty($notifikasi)) {
            return $this->sendError('Notifikasi not found');
        }

        return $this->sendResponse($notifikasi->toArray(), 'Notifikasi retrieved successfully');
    }

    /**
     * Update the specified notifikasi in storage.
     * PUT/PATCH /notifikasis/{id}
     *
     * @param  int $id
     * @param UpdatenotifikasiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatenotifikasiAPIRequest $request)
    {
        $input = $request->all();

        /** @var notifikasi $notifikasi */
        $notifikasi = $this->notifikasiRepository->findWithoutFail($id);

        if (empty($notifikasi)) {
            return $this->sendError('Notifikasi not found');
        }

        $notifikasi = $this->notifikasiRepository->update($input, $id);

        return $this->sendResponse($notifikasi->toArray(), 'notifikasi updated successfully');
    }

    /**
     * Remove the specified notifikasi from storage.
     * DELETE /notifikasis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var notifikasi $notifikasi */
        $notifikasi = $this->notifikasiRepository->findWithoutFail($id);

        if (empty($notifikasi)) {
            return $this->sendError('Notifikasi not found');
        }

        $notifikasi->delete();

        return $this->sendResponse($id, 'Notifikasi deleted successfully');
    }
}
