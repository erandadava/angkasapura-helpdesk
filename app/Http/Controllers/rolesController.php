<?php

namespace App\Http\Controllers;

use App\DataTables\rolesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreaterolesRequest;
use App\Http\Requests\UpdaterolesRequest;
use App\Repositories\rolesRepository;
use Flash;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\AppBaseController;
use Response;

class rolesController extends AppBaseController
{
    /** @var  rolesRepository */
    private $rolesRepository;

    public function __construct(rolesRepository $rolesRepo)
    {
        $this->rolesRepository = $rolesRepo;
    }

    /**
     * Display a listing of the roles.
     *
     * @param rolesDataTable $rolesDataTable
     * @return Response
     */
    public function index(rolesDataTable $rolesDataTable)
    {
        return $rolesDataTable->render('roles.index');
    }

    /**
     * Show the form for creating a new roles.
     *
     * @return Response
     */
    public function create()
    {

        return view('roles.create');
    }

    /**
     * Store a newly created roles in storage.
     *
     * @param CreaterolesRequest $request
     *
     * @return Response
     */
    public function store(CreaterolesRequest $request)
    {
        $input = $request->all();

        // $roles = $this->rolesRepository->create($input);
        Role::create(['name' => $input['name']]);

        Flash::success('Roles saved successfully.');

        return redirect(route('roles.index'));
    }

    /**
     * Display the specified roles.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roles = $this->rolesRepository->findWithoutFail($id);

        if (empty($roles)) {
            Flash::error('Roles not found');

            return redirect(route('roles.index'));
        }

        return view('roles.show')->with('roles', $roles);
    }

    /**
     * Show the form for editing the specified roles.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roles = $this->rolesRepository->findWithoutFail($id);

        if (empty($roles)) {
            Flash::error('Roles not found');

            return redirect(route('roles.index'));
        }

        return view('roles.edit')->with('roles', $roles);
    }

    /**
     * Update the specified roles in storage.
     *
     * @param  int              $id
     * @param UpdaterolesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdaterolesRequest $request)
    {
        $roles = $this->rolesRepository->findWithoutFail($id);

        if (empty($roles)) {
            Flash::error('Roles not found');

            return redirect(route('roles.index'));
        }

        $roles = $this->rolesRepository->update($request->all(), $id);

        Flash::success('Roles updated successfully.');

        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified roles from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roles = $this->rolesRepository->findWithoutFail($id);

        if (empty($roles)) {
            Flash::error('Roles not found');

            return redirect(route('roles.index'));
        }

        $this->rolesRepository->delete($id);

        Flash::success('Roles deleted successfully.');

        return redirect(route('roles.index'));
    }
}
