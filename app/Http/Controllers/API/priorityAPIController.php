<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatepriorityAPIRequest;
use App\Http\Requests\API\UpdatepriorityAPIRequest;
use App\Models\priority;
use App\Repositories\priorityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class priorityController
 * @package App\Http\Controllers\API
 */

class priorityAPIController extends AppBaseController
{
    /** @var  priorityRepository */
    private $priorityRepository;

    public function __construct(priorityRepository $priorityRepo)
    {
        $this->priorityRepository = $priorityRepo;
    }

    /**
     * Display a listing of the priority.
     * GET|HEAD /priorities
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->priorityRepository->pushCriteria(new RequestCriteria($request));
        $this->priorityRepository->pushCriteria(new LimitOffsetCriteria($request));
        $priorities = $this->priorityRepository->all();

        return $this->sendResponse($priorities->toArray(), 'Priorities retrieved successfully');
    }

    /**
     * Store a newly created priority in storage.
     * POST /priorities
     *
     * @param CreatepriorityAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatepriorityAPIRequest $request)
    {
        $input = $request->all();

        $priority = $this->priorityRepository->create($input);

        return $this->sendResponse($priority->toArray(), 'Priority saved successfully');
    }

    /**
     * Display the specified priority.
     * GET|HEAD /priorities/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var priority $priority */
        $priority = $this->priorityRepository->findWithoutFail($id);

        if (empty($priority)) {
            return $this->sendError('Priority not found');
        }

        return $this->sendResponse($priority->toArray(), 'Priority retrieved successfully');
    }

    /**
     * Update the specified priority in storage.
     * PUT/PATCH /priorities/{id}
     *
     * @param  int $id
     * @param UpdatepriorityAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepriorityAPIRequest $request)
    {
        $input = $request->all();

        /** @var priority $priority */
        $priority = $this->priorityRepository->findWithoutFail($id);

        if (empty($priority)) {
            return $this->sendError('Priority not found');
        }

        $priority = $this->priorityRepository->update($input, $id);

        return $this->sendResponse($priority->toArray(), 'priority updated successfully');
    }

    /**
     * Remove the specified priority from storage.
     * DELETE /priorities/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var priority $priority */
        $priority = $this->priorityRepository->findWithoutFail($id);

        if (empty($priority)) {
            return $this->sendError('Priority not found');
        }

        $priority->delete();

        return $this->sendResponse($id, 'Priority deleted successfully');
    }
}
