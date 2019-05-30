<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createcat_inventoryAPIRequest;
use App\Http\Requests\API\Updatecat_inventoryAPIRequest;
use App\Models\cat_inventory;
use App\Repositories\cat_inventoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class cat_inventoryController
 * @package App\Http\Controllers\API
 */

class cat_inventoryAPIController extends AppBaseController
{
    /** @var  cat_inventoryRepository */
    private $catInventoryRepository;

    public function __construct(cat_inventoryRepository $catInventoryRepo)
    {
        $this->catInventoryRepository = $catInventoryRepo;
    }

    /**
     * Display a listing of the cat_inventory.
     * GET|HEAD /catInventories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->catInventoryRepository->pushCriteria(new RequestCriteria($request));
        $this->catInventoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $catInventories = $this->catInventoryRepository->all();

        return $this->sendResponse($catInventories->toArray(), 'Cat Inventories retrieved successfully');
    }

    /**
     * Store a newly created cat_inventory in storage.
     * POST /catInventories
     *
     * @param Createcat_inventoryAPIRequest $request
     *
     * @return Response
     */
    public function store(Createcat_inventoryAPIRequest $request)
    {
        $input = $request->all();

        $catInventory = $this->catInventoryRepository->create($input);

        return $this->sendResponse($catInventory->toArray(), 'Cat Inventory saved successfully');
    }

    /**
     * Display the specified cat_inventory.
     * GET|HEAD /catInventories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var cat_inventory $catInventory */
        $catInventory = $this->catInventoryRepository->findWithoutFail($id);

        if (empty($catInventory)) {
            return $this->sendError('Cat Inventory not found');
        }

        return $this->sendResponse($catInventory->toArray(), 'Cat Inventory retrieved successfully');
    }

    /**
     * Update the specified cat_inventory in storage.
     * PUT/PATCH /catInventories/{id}
     *
     * @param  int $id
     * @param Updatecat_inventoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatecat_inventoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var cat_inventory $catInventory */
        $catInventory = $this->catInventoryRepository->findWithoutFail($id);

        if (empty($catInventory)) {
            return $this->sendError('Cat Inventory not found');
        }

        $catInventory = $this->catInventoryRepository->update($input, $id);

        return $this->sendResponse($catInventory->toArray(), 'cat_inventory updated successfully');
    }

    /**
     * Remove the specified cat_inventory from storage.
     * DELETE /catInventories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var cat_inventory $catInventory */
        $catInventory = $this->catInventoryRepository->findWithoutFail($id);

        if (empty($catInventory)) {
            return $this->sendError('Cat Inventory not found');
        }

        $catInventory->delete();

        return $this->sendResponse($id, 'Cat Inventory deleted successfully');
    }
}
