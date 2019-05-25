<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createmodel_has_rolesAPIRequest;
use App\Http\Requests\API\Updatemodel_has_rolesAPIRequest;
use App\Models\model_has_roles;
use App\Repositories\model_has_rolesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class model_has_rolesController
 * @package App\Http\Controllers\API
 */

class model_has_rolesAPIController extends AppBaseController
{
    /** @var  model_has_rolesRepository */
    private $modelHasRolesRepository;

    public function __construct(model_has_rolesRepository $modelHasRolesRepo)
    {
        $this->modelHasRolesRepository = $modelHasRolesRepo;
    }

    /**
     * Display a listing of the model_has_roles.
     * GET|HEAD /modelHasRoles
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->modelHasRolesRepository->pushCriteria(new RequestCriteria($request));
        $this->modelHasRolesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $modelHasRoles = $this->modelHasRolesRepository->all();

        return $this->sendResponse($modelHasRoles->toArray(), 'Model Has Roles retrieved successfully');
    }

    /**
     * Store a newly created model_has_roles in storage.
     * POST /modelHasRoles
     *
     * @param Createmodel_has_rolesAPIRequest $request
     *
     * @return Response
     */
    public function store(Createmodel_has_rolesAPIRequest $request)
    {
        $input = $request->all();

        $modelHasRoles = $this->modelHasRolesRepository->create($input);

        return $this->sendResponse($modelHasRoles->toArray(), 'Model Has Roles saved successfully');
    }

    /**
     * Display the specified model_has_roles.
     * GET|HEAD /modelHasRoles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var model_has_roles $modelHasRoles */
        $modelHasRoles = $this->modelHasRolesRepository->findWithoutFail($id);

        if (empty($modelHasRoles)) {
            return $this->sendError('Model Has Roles not found');
        }

        return $this->sendResponse($modelHasRoles->toArray(), 'Model Has Roles retrieved successfully');
    }

    /**
     * Update the specified model_has_roles in storage.
     * PUT/PATCH /modelHasRoles/{id}
     *
     * @param  int $id
     * @param Updatemodel_has_rolesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatemodel_has_rolesAPIRequest $request)
    {
        $input = $request->all();

        /** @var model_has_roles $modelHasRoles */
        $modelHasRoles = $this->modelHasRolesRepository->findWithoutFail($id);

        if (empty($modelHasRoles)) {
            return $this->sendError('Model Has Roles not found');
        }

        $modelHasRoles = $this->modelHasRolesRepository->update($input, $id);

        return $this->sendResponse($modelHasRoles->toArray(), 'model_has_roles updated successfully');
    }

    /**
     * Remove the specified model_has_roles from storage.
     * DELETE /modelHasRoles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var model_has_roles $modelHasRoles */
        $modelHasRoles = $this->modelHasRolesRepository->findWithoutFail($id);

        if (empty($modelHasRoles)) {
            return $this->sendError('Model Has Roles not found');
        }

        $modelHasRoles->delete();

        return $this->sendResponse($id, 'Model Has Roles deleted successfully');
    }
}
