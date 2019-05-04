<?php

namespace App\Http\Controllers;

use App\DataTables\issuesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateissuesRequest;
use App\Http\Requests\UpdateissuesRequest;
use App\Repositories\issuesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class issuesController extends AppBaseController
{
    /** @var  issuesRepository */
    private $issuesRepository;

    public function __construct(issuesRepository $issuesRepo)
    {
        $this->issuesRepository = $issuesRepo;
    }

    /**
     * Display a listing of the issues.
     *
     * @param issuesDataTable $issuesDataTable
     * @return Response
     */
    public function index(issuesDataTable $issuesDataTable)
    {
        return $issuesDataTable->render('issues.index');
    }

    /**
     * Show the form for creating a new issues.
     *
     * @return Response
     */
    public function create()
    {
        return view('issues.create');
    }

    /**
     * Store a newly created issues in storage.
     *
     * @param CreateissuesRequest $request
     *
     * @return Response
     */
    public function store(CreateissuesRequest $request)
    {
        $input = $request->all();

        $issues = $this->issuesRepository->create($input);

        Flash::success('Issues saved successfully.');

        return redirect(route('issues.index'));
    }

    /**
     * Display the specified issues.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $issues = $this->issuesRepository->findWithoutFail($id);

        if (empty($issues)) {
            Flash::error('Issues not found');

            return redirect(route('issues.index'));
        }

        return view('issues.show')->with('issues', $issues);
    }

    /**
     * Show the form for editing the specified issues.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $issues = $this->issuesRepository->findWithoutFail($id);

        if (empty($issues)) {
            Flash::error('Issues not found');

            return redirect(route('issues.index'));
        }

        return view('issues.edit')->with('issues', $issues);
    }

    /**
     * Update the specified issues in storage.
     *
     * @param  int              $id
     * @param UpdateissuesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateissuesRequest $request)
    {
        $issues = $this->issuesRepository->findWithoutFail($id);

        if (empty($issues)) {
            Flash::error('Issues not found');

            return redirect(route('issues.index'));
        }

        $issues = $this->issuesRepository->update($request->all(), $id);

        Flash::success('Issues updated successfully.');

        return redirect(route('issues.index'));
    }

    /**
     * Remove the specified issues from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $issues = $this->issuesRepository->findWithoutFail($id);

        if (empty($issues)) {
            Flash::error('Issues not found');

            return redirect(route('issues.index'));
        }

        $this->issuesRepository->delete($id);

        Flash::success('Issues deleted successfully.');

        return redirect(route('issues.index'));
    }
}
