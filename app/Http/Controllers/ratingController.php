<?php

namespace App\Http\Controllers;

use App\DataTables\ratingDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateratingRequest;
use App\Http\Requests\UpdateratingRequest;
use App\Repositories\ratingRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ratingController extends AppBaseController
{
    /** @var  ratingRepository */
    private $ratingRepository;

    public function __construct(ratingRepository $ratingRepo)
    {
        $this->ratingRepository = $ratingRepo;
    }

    /**
     * Display a listing of the rating.
     *
     * @param ratingDataTable $ratingDataTable
     * @return Response
     */
    public function index(ratingDataTable $ratingDataTable)
    {
        return $ratingDataTable->render('ratings.index');
    }

    /**
     * Show the form for creating a new rating.
     *
     * @return Response
     */
    public function create()
    {
        return view('ratings.create');
    }

    /**
     * Store a newly created rating in storage.
     *
     * @param CreateratingRequest $request
     *
     * @return Response
     */
    public function store(CreateratingRequest $request)
    {
        $input = $request->all();

        $rating = $this->ratingRepository->create($input);

        Flash::success('Rating saved successfully.');

        return redirect(route('ratings.index'));
    }

    /**
     * Display the specified rating.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rating = $this->ratingRepository->findWithoutFail($id);

        if (empty($rating)) {
            Flash::error('Rating not found');

            return redirect(route('ratings.index'));
        }

        return view('ratings.show')->with('rating', $rating);
    }

    /**
     * Show the form for editing the specified rating.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rating = $this->ratingRepository->findWithoutFail($id);

        if (empty($rating)) {
            Flash::error('Rating not found');

            return redirect(route('ratings.index'));
        }

        return view('ratings.edit')->with('rating', $rating);
    }

    /**
     * Update the specified rating in storage.
     *
     * @param  int              $id
     * @param UpdateratingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateratingRequest $request)
    {
        $rating = $this->ratingRepository->findWithoutFail($id);

        if (empty($rating)) {
            Flash::error('Rating not found');

            return redirect(route('ratings.index'));
        }

        $rating = $this->ratingRepository->update($request->all(), $id);

        Flash::success('Rating updated successfully.');

        return redirect(route('ratings.index'));
    }

    /**
     * Remove the specified rating from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rating = $this->ratingRepository->findWithoutFail($id);

        if (empty($rating)) {
            Flash::error('Rating not found');

            return redirect(route('ratings.index'));
        }

        $this->ratingRepository->delete($id);

        Flash::success('Rating deleted successfully.');

        return redirect(route('ratings.index'));
    }
}
