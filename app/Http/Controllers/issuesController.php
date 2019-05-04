<?php

namespace App\Http\Controllers;

use App\DataTables\issuesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateissuesRequest;
use App\Http\Requests\UpdateissuesRequest;
use App\Repositories\issuesRepository;
use App\Models\category;
use App\Models\priority;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Carbon;

class issuesController extends AppBaseController
{
    /** @var  issuesRepository */
    private $issuesRepository;

    public function __construct(issuesRepository $issuesRepo)
    {
        $this->issuesRepository = $issuesRepo;
        $this->mytime = Carbon\Carbon::now();
        $this->waktu_sekarang = $this->mytime->toDateTimeString();
        $this->data['category'] = category::pluck('cat_name','id');
        $this->data['priority'] = priority::pluck('prio_name','id');
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
        return view('issues.create')->with($this->data);
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
        $input['issue_date'] = $this->waktu_sekarang;
        $issues = $this->issuesRepository->create($input);
        $kode = $issues->id.$issues->request_id.$this->mytime->format('ymdhis');
        $this->issuesRepository->update(['issue_id'=>$kode], $issues->id);
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
        $issues = $this->issuesRepository->with(['category','priority','request','complete'])->findWithoutFail($id);

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
        $this->data['issues'] = $this->issuesRepository->findWithoutFail($id);

        if (empty($this->data['issues'])) {
            Flash::error('Issues not found');

            return redirect(route('issues.index'));
        }

        return view('issues.edit')->with($this->data);
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
