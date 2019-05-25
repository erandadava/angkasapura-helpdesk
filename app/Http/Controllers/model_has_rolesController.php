<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createmodel_has_rolesRequest;
use App\Http\Requests\Updatemodel_has_rolesRequest;
use App\Repositories\model_has_rolesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class model_has_rolesController extends AppBaseController
{
    /** @var  model_has_rolesRepository */
    private $modelHasRolesRepository;

    public function __construct(model_has_rolesRepository $modelHasRolesRepo)
    {
        $this->modelHasRolesRepository = $modelHasRolesRepo;
    }

    /**
     * Display a listing of the model_has_roles.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->modelHasRolesRepository->pushCriteria(new RequestCriteria($request));
        $modelHasRoles = $this->modelHasRolesRepository->all();

        return view('model_has_roles.index')
            ->with('modelHasRoles', $modelHasRoles);
    }

    /**
     * Show the form for creating a new model_has_roles.
     *
     * @return Response
     */
    public function create()
    {
        return view('model_has_roles.create');
    }

    /**
     * Store a newly created model_has_roles in storage.
     *
     * @param Createmodel_has_rolesRequest $request
     *
     * @return Response
     */
    public function store(Createmodel_has_rolesRequest $request)
    {
        $input = $request->all();

        $modelHasRoles = $this->modelHasRolesRepository->create($input);

        Flash::success('Model Has Roles saved successfully.');

        return redirect(route('modelHasRoles.index'));
    }

    /**
     * Display the specified model_has_roles.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modelHasRoles = $this->modelHasRolesRepository->findWithoutFail($id);

        if (empty($modelHasRoles)) {
            Flash::error('Model Has Roles not found');

            return redirect(route('modelHasRoles.index'));
        }

        return view('model_has_roles.show')->with('modelHasRoles', $modelHasRoles);
    }

    /**
     * Show the form for editing the specified model_has_roles.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modelHasRoles = $this->modelHasRolesRepository->findWithoutFail($id);

        if (empty($modelHasRoles)) {
            Flash::error('Model Has Roles not found');

            return redirect(route('modelHasRoles.index'));
        }

        return view('model_has_roles.edit')->with('modelHasRoles', $modelHasRoles);
    }

    /**
     * Update the specified model_has_roles in storage.
     *
     * @param  int              $id
     * @param Updatemodel_has_rolesRequest $request
     *
     * @return Response
     */
    public function update($id, Updatemodel_has_rolesRequest $request)
    {
        $modelHasRoles = $this->modelHasRolesRepository->findWithoutFail($id);

        if (empty($modelHasRoles)) {
            Flash::error('Model Has Roles not found');

            return redirect(route('modelHasRoles.index'));
        }

        $modelHasRoles = $this->modelHasRolesRepository->update($request->all(), $id);

        Flash::success('Model Has Roles updated successfully.');

        return redirect(route('modelHasRoles.index'));
    }

    /**
     * Remove the specified model_has_roles from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modelHasRoles = $this->modelHasRolesRepository->findWithoutFail($id);

        if (empty($modelHasRoles)) {
            Flash::error('Model Has Roles not found');

            return redirect(route('modelHasRoles.index'));
        }

        $this->modelHasRolesRepository->delete($id);

        Flash::success('Model Has Roles deleted successfully.');

        return redirect(route('modelHasRoles.index'));
    }
}
