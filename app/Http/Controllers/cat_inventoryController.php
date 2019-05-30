<?php

namespace App\Http\Controllers;

use App\DataTables\cat_inventoryDataTable;
use App\Http\Requests;
use App\Http\Requests\Createcat_inventoryRequest;
use App\Http\Requests\Updatecat_inventoryRequest;
use App\Repositories\cat_inventoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class cat_inventoryController extends AppBaseController
{
    /** @var  cat_inventoryRepository */
    private $catInventoryRepository;

    public function __construct(cat_inventoryRepository $catInventoryRepo)
    {
        $this->catInventoryRepository = $catInventoryRepo;
    }

    /**
     * Display a listing of the cat_inventory.
     *
     * @param cat_inventoryDataTable $catInventoryDataTable
     * @return Response
     */
    public function index(cat_inventoryDataTable $catInventoryDataTable)
    {
        return $catInventoryDataTable->render('cat_inventories.index');
    }

    /**
     * Show the form for creating a new cat_inventory.
     *
     * @return Response
     */
    public function create()
    {
        return view('cat_inventories.create');
    }

    /**
     * Store a newly created cat_inventory in storage.
     *
     * @param Createcat_inventoryRequest $request
     *
     * @return Response
     */
    public function store(Createcat_inventoryRequest $request)
    {
        $input = $request->all();

        $catInventory = $this->catInventoryRepository->create($input);

        Flash::success('Cat Inventory saved successfully.');

        return redirect(route('catInventories.index'));
    }

    /**
     * Display the specified cat_inventory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catInventory = $this->catInventoryRepository->findWithoutFail($id);

        if (empty($catInventory)) {
            Flash::error('Cat Inventory not found');

            return redirect(route('catInventories.index'));
        }

        return view('cat_inventories.show')->with('catInventory', $catInventory);
    }

    /**
     * Show the form for editing the specified cat_inventory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catInventory = $this->catInventoryRepository->findWithoutFail($id);

        if (empty($catInventory)) {
            Flash::error('Cat Inventory not found');

            return redirect(route('catInventories.index'));
        }

        return view('cat_inventories.edit')->with('catInventory', $catInventory);
    }

    /**
     * Update the specified cat_inventory in storage.
     *
     * @param  int              $id
     * @param Updatecat_inventoryRequest $request
     *
     * @return Response
     */
    public function update($id, Updatecat_inventoryRequest $request)
    {
        $catInventory = $this->catInventoryRepository->findWithoutFail($id);

        if (empty($catInventory)) {
            Flash::error('Cat Inventory not found');

            return redirect(route('catInventories.index'));
        }

        $catInventory = $this->catInventoryRepository->update($request->all(), $id);

        Flash::success('Cat Inventory updated successfully.');

        return redirect(route('catInventories.index'));
    }

    /**
     * Remove the specified cat_inventory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catInventory = $this->catInventoryRepository->findWithoutFail($id);

        if (empty($catInventory)) {
            Flash::error('Cat Inventory not found');

            return redirect(route('catInventories.index'));
        }

        $this->catInventoryRepository->delete($id);

        Flash::success('Cat Inventory deleted successfully.');

        return redirect(route('catInventories.index'));
    }
}
