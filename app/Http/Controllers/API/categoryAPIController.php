<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecategoryAPIRequest;
use App\Http\Requests\API\UpdatecategoryAPIRequest;
use App\Models\category;
use App\Repositories\categoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class categoryController
 * @package App\Http\Controllers\API
 */

class categoryAPIController extends AppBaseController
{
    /** @var  categoryRepository */
    private $categoryRepository;

    public function __construct(categoryRepository $categoryRepo)
    {
        $this->categoryRepository = $categoryRepo;
    }

    /**
     * Display a listing of the category.
     * GET|HEAD /categories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->categoryRepository->pushCriteria(new RequestCriteria($request));
        $this->categoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $categories = $this->categoryRepository->all();

        return $this->sendResponse($categories->toArray(), 'Categories retrieved successfully');
    }

    /**
     * Store a newly created category in storage.
     * POST /categories
     *
     * @param CreatecategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatecategoryAPIRequest $request)
    {
        $input = $request->all();

        $category = $this->categoryRepository->create($input);

        return $this->sendResponse($category->toArray(), 'Category saved successfully');
    }

    /**
     * Display the specified category.
     * GET|HEAD /categories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var category $category */
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            return $this->sendError('Category not found');
        }

        return $this->sendResponse($category->toArray(), 'Category retrieved successfully');
    }

    /**
     * Update the specified category in storage.
     * PUT/PATCH /categories/{id}
     *
     * @param  int $id
     * @param UpdatecategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var category $category */
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            return $this->sendError('Category not found');
        }

        $category = $this->categoryRepository->update($input, $id);

        return $this->sendResponse($category->toArray(), 'category updated successfully');
    }

    /**
     * Remove the specified category from storage.
     * DELETE /categories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var category $category */
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            return $this->sendError('Category not found');
        }

        $category->delete();

        return $this->sendResponse($id, 'Category deleted successfully');
    }
}
