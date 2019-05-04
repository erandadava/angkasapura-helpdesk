<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateissuesAPIRequest;
use App\Http\Requests\API\UpdateissuesAPIRequest;
use App\Models\issues;
use App\Repositories\issuesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class issuesController
 * @package App\Http\Controllers\API
 */

class issuesAPIController extends AppBaseController
{
    /** @var  issuesRepository */
    private $issuesRepository;

    public function __construct(issuesRepository $issuesRepo)
    {
        $this->issuesRepository = $issuesRepo;
    }

    /**
     * Display a listing of the issues.
     * GET|HEAD /issues
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->issuesRepository->pushCriteria(new RequestCriteria($request));
        $this->issuesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $issues = $this->issuesRepository->all();

        return $this->sendResponse($issues->toArray(), 'Issues retrieved successfully');
    }

    /**
     * Store a newly created issues in storage.
     * POST /issues
     *
     * @param CreateissuesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateissuesAPIRequest $request)
    {
        $input = $request->all();

        $issues = $this->issuesRepository->create($input);

        return $this->sendResponse($issues->toArray(), 'Issues saved successfully');
    }

    /**
     * Display the specified issues.
     * GET|HEAD /issues/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var issues $issues */
        $issues = $this->issuesRepository->findWithoutFail($id);

        if (empty($issues)) {
            return $this->sendError('Issues not found');
        }

        return $this->sendResponse($issues->toArray(), 'Issues retrieved successfully');
    }

    /**
     * Update the specified issues in storage.
     * PUT/PATCH /issues/{id}
     *
     * @param  int $id
     * @param UpdateissuesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateissuesAPIRequest $request)
    {
        $input = $request->all();

        /** @var issues $issues */
        $issues = $this->issuesRepository->findWithoutFail($id);

        if (empty($issues)) {
            return $this->sendError('Issues not found');
        }

        $issues = $this->issuesRepository->update($input, $id);

        return $this->sendResponse($issues->toArray(), 'issues updated successfully');
    }

    /**
     * Remove the specified issues from storage.
     * DELETE /issues/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var issues $issues */
        $issues = $this->issuesRepository->findWithoutFail($id);

        if (empty($issues)) {
            return $this->sendError('Issues not found');
        }

        $issues->delete();

        return $this->sendResponse($id, 'Issues deleted successfully');
    }
}
