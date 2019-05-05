<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreaterolesAPIRequest;
use App\Http\Requests\API\UpdaterolesAPIRequest;
use App\Models\roles;
use App\Repositories\rolesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class rolesController
 * @package App\Http\Controllers\API
 */

class rolesAPIController extends AppBaseController
{
    /** @var  rolesRepository */
    private $rolesRepository;

    public function __construct(rolesRepository $rolesRepo)
    {
        $this->rolesRepository = $rolesRepo;
    }

    /**
     * Display a listing of the roles.
     * GET|HEAD /roles
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->rolesRepository->pushCriteria(new RequestCriteria($request));
        $this->rolesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $roles = $this->rolesRepository->all();

        return $this->sendResponse($roles->toArray(), 'Roles retrieved successfully');
    }

    /**
     * Store a newly created roles in storage.
     * POST /roles
     *
     * @param CreaterolesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreaterolesAPIRequest $request)
    {
        $input = $request->all();

        $roles = $this->rolesRepository->create($input);

        return $this->sendResponse($roles->toArray(), 'Roles saved successfully');
    }

    /**
     * Display the specified roles.
     * GET|HEAD /roles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var roles $roles */
        $roles = $this->rolesRepository->findWithoutFail($id);

        if (empty($roles)) {
            return $this->sendError('Roles not found');
        }

        return $this->sendResponse($roles->toArray(), 'Roles retrieved successfully');
    }

    /**
     * Update the specified roles in storage.
     * PUT/PATCH /roles/{id}
     *
     * @param  int $id
     * @param UpdaterolesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdaterolesAPIRequest $request)
    {
        $input = $request->all();

        /** @var roles $roles */
        $roles = $this->rolesRepository->findWithoutFail($id);

        if (empty($roles)) {
            return $this->sendError('Roles not found');
        }

        $roles = $this->rolesRepository->update($input, $id);

        return $this->sendResponse($roles->toArray(), 'roles updated successfully');
    }

    /**
     * Remove the specified roles from storage.
     * DELETE /roles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var roles $roles */
        $roles = $this->rolesRepository->findWithoutFail($id);

        if (empty($roles)) {
            return $this->sendError('Roles not found');
        }

        $roles->delete();

        return $this->sendResponse($id, 'Roles deleted successfully');
    }
}
