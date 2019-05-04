<?php

namespace App\Http\Controllers;

use App\DataTables\priorityDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatepriorityRequest;
use App\Http\Requests\UpdatepriorityRequest;
use App\Repositories\priorityRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class priorityController extends AppBaseController
{
    /** @var  priorityRepository */
    private $priorityRepository;

    public function __construct(priorityRepository $priorityRepo)
    {
        $this->priorityRepository = $priorityRepo;
    }

    /**
     * Display a listing of the priority.
     *
     * @param priorityDataTable $priorityDataTable
     * @return Response
     */
    public function index(priorityDataTable $priorityDataTable)
    {
        return $priorityDataTable->render('priorities.index');
    }

    /**
     * Show the form for creating a new priority.
     *
     * @return Response
     */
    public function create()
    {
        return view('priorities.create');
    }

    /**
     * Store a newly created priority in storage.
     *
     * @param CreatepriorityRequest $request
     *
     * @return Response
     */
    public function store(CreatepriorityRequest $request)
    {
        $input = $request->all();

        $priority = $this->priorityRepository->create($input);

        Flash::success('Priority saved successfully.');

        return redirect(route('priorities.index'));
    }

    /**
     * Display the specified priority.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $priority = $this->priorityRepository->findWithoutFail($id);

        if (empty($priority)) {
            Flash::error('Priority not found');

            return redirect(route('priorities.index'));
        }

        return view('priorities.show')->with('priority', $priority);
    }

    /**
     * Show the form for editing the specified priority.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $priority = $this->priorityRepository->findWithoutFail($id);

        if (empty($priority)) {
            Flash::error('Priority not found');

            return redirect(route('priorities.index'));
        }

        return view('priorities.edit')->with('priority', $priority);
    }

    /**
     * Update the specified priority in storage.
     *
     * @param  int              $id
     * @param UpdatepriorityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepriorityRequest $request)
    {
        $priority = $this->priorityRepository->findWithoutFail($id);

        if (empty($priority)) {
            Flash::error('Priority not found');

            return redirect(route('priorities.index'));
        }

        $priority = $this->priorityRepository->update($request->all(), $id);

        Flash::success('Priority updated successfully.');

        return redirect(route('priorities.index'));
    }

    /**
     * Remove the specified priority from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $priority = $this->priorityRepository->findWithoutFail($id);

        if (empty($priority)) {
            Flash::error('Priority not found');

            return redirect(route('priorities.index'));
        }

        $this->priorityRepository->delete($id);

        Flash::success('Priority deleted successfully.');

        return redirect(route('priorities.index'));
    }
}
