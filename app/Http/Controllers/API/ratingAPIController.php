<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateratingAPIRequest;
use App\Http\Requests\API\UpdateratingAPIRequest;
use App\Models\rating;
use App\Repositories\ratingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ratingController
 * @package App\Http\Controllers\API
 */

class ratingAPIController extends AppBaseController
{
    /** @var  ratingRepository */
    private $ratingRepository;

    public function __construct(ratingRepository $ratingRepo)
    {
        $this->ratingRepository = $ratingRepo;
    }

    /**
     * Display a listing of the rating.
     * GET|HEAD /ratings
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ratingRepository->pushCriteria(new RequestCriteria($request));
        $this->ratingRepository->pushCriteria(new LimitOffsetCriteria($request));
        $ratings = $this->ratingRepository->all();

        return $this->sendResponse($ratings->toArray(), 'Ratings retrieved successfully');
    }

    /**
     * Store a newly created rating in storage.
     * POST /ratings
     *
     * @param CreateratingAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateratingAPIRequest $request)
    {
        $input = $request->all();

        $rating = $this->ratingRepository->create($input);

        return $this->sendResponse($rating->toArray(), 'Rating saved successfully');
    }

    /**
     * Display the specified rating.
     * GET|HEAD /ratings/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var rating $rating */
        $rating = $this->ratingRepository->findWithoutFail($id);

        if (empty($rating)) {
            return $this->sendError('Rating not found');
        }

        return $this->sendResponse($rating->toArray(), 'Rating retrieved successfully');
    }

    /**
     * Update the specified rating in storage.
     * PUT/PATCH /ratings/{id}
     *
     * @param  int $id
     * @param UpdateratingAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateratingAPIRequest $request)
    {
        $input = $request->all();

        /** @var rating $rating */
        $rating = $this->ratingRepository->findWithoutFail($id);

        if (empty($rating)) {
            return $this->sendError('Rating not found');
        }

        $rating = $this->ratingRepository->update($input, $id);

        return $this->sendResponse($rating->toArray(), 'rating updated successfully');
    }

    /**
     * Remove the specified rating from storage.
     * DELETE /ratings/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var rating $rating */
        $rating = $this->ratingRepository->findWithoutFail($id);

        if (empty($rating)) {
            return $this->sendError('Rating not found');
        }

        $rating->delete();

        return $this->sendResponse($id, 'Rating deleted successfully');
    }
}
