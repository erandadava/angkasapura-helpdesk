<?php

namespace App\Http\Controllers;

use App\DataTables\inventoryDataTable;
use App\DataTables\laporanInventoryDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateinventoryRequest;
use App\Http\Requests\UpdateinventoryRequest;
use App\Repositories\inventoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\cat_inventory;
use Illuminate\Http\Request;

class inventoryController extends AppBaseController
{
    /** @var  inventoryRepository */
    private $inventoryRepository;

    public function __construct(inventoryRepository $inventoryRepo)
    {
        $this->inventoryRepository = $inventoryRepo;
        $this->data['cat_inventory'] = cat_inventory::where('is_active','=',1)->pluck('nama_cat','id');
    }

    /**
     * Display a listing of the inventory.
     *
     * @param inventoryDataTable $inventoryDataTable
     * @return Response
     */
    public function index(inventoryDataTable $inventoryDataTable, laporanInventoryDataTable $laporanInventoryDataTable, Request $request)
    {
        if($request->n){
            return $laporanInventoryDataTable->render('inventories.indexlaporan');
        }
        return $inventoryDataTable->render('inventories.index');
    }

    /**
     * Show the form for creating a new inventory.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventories.create')->with($this->data);
    }

    /**
     * Store a newly created inventory in storage.
     *
     * @param CreateinventoryRequest $request
     *
     * @return Response
     */
    public function store(CreateinventoryRequest $request)
    {
        $input = $request->all();

        $inventory = $this->inventoryRepository->create($input);

        Flash::success('Inventory saved successfully.');

        return redirect(route('inventories.index'));
    }

    /**
     * Display the specified inventory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $this->data['inventory'] = $this->inventoryRepository->with('cat_inventory')->findWithoutFail($id);

        if (empty($this->data['inventory'])) {
            Flash::error('Inventory not found');

            return redirect(route('inventories.index'));
        }

        return view('inventories.show')->with($this->data);
    }

    /**
     * Show the form for editing the specified inventory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $this->data['inventory'] = $this->inventoryRepository->findWithoutFail($id);

        if (empty($this->data['inventory'])) {
            Flash::error('Inventory not found');

            return redirect(route('inventories.index'));
        }

        return view('inventories.edit')->with($this->data);
    }

    /**
     * Update the specified inventory in storage.
     *
     * @param  int              $id
     * @param UpdateinventoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateinventoryRequest $request)
    {
        $inventory = $this->inventoryRepository->findWithoutFail($id);

        if (empty($inventory)) {
            Flash::error('Inventory not found');

            return redirect(route('inventories.index'));
        }

        $inventory = $this->inventoryRepository->update($request->all(), $id);

        Flash::success('Inventory updated successfully.');

        return redirect(route('inventories.index'));
    }

    /**
     * Remove the specified inventory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inventory = $this->inventoryRepository->findWithoutFail($id);

        if (empty($inventory)) {
            Flash::error('Inventory not found');

            return redirect(route('inventories.index'));
        }

        $this->inventoryRepository->delete($id);

        Flash::success('Inventory deleted successfully.');

        return redirect(route('inventories.index'));
    }
}
