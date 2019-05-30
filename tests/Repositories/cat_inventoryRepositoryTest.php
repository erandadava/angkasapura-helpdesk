<?php namespace Tests\Repositories;

use App\Models\cat_inventory;
use App\Repositories\cat_inventoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\Makecat_inventoryTrait;
use Tests\ApiTestTrait;

class cat_inventoryRepositoryTest extends TestCase
{
    use Makecat_inventoryTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var cat_inventoryRepository
     */
    protected $catInventoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->catInventoryRepo = \App::make(cat_inventoryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cat_inventory()
    {
        $catInventory = $this->fakecat_inventoryData();
        $createdcat_inventory = $this->catInventoryRepo->create($catInventory);
        $createdcat_inventory = $createdcat_inventory->toArray();
        $this->assertArrayHasKey('id', $createdcat_inventory);
        $this->assertNotNull($createdcat_inventory['id'], 'Created cat_inventory must have id specified');
        $this->assertNotNull(cat_inventory::find($createdcat_inventory['id']), 'cat_inventory with given id must be in DB');
        $this->assertModelData($catInventory, $createdcat_inventory);
    }

    /**
     * @test read
     */
    public function test_read_cat_inventory()
    {
        $catInventory = $this->makecat_inventory();
        $dbcat_inventory = $this->catInventoryRepo->find($catInventory->id);
        $dbcat_inventory = $dbcat_inventory->toArray();
        $this->assertModelData($catInventory->toArray(), $dbcat_inventory);
    }

    /**
     * @test update
     */
    public function test_update_cat_inventory()
    {
        $catInventory = $this->makecat_inventory();
        $fakecat_inventory = $this->fakecat_inventoryData();
        $updatedcat_inventory = $this->catInventoryRepo->update($fakecat_inventory, $catInventory->id);
        $this->assertModelData($fakecat_inventory, $updatedcat_inventory->toArray());
        $dbcat_inventory = $this->catInventoryRepo->find($catInventory->id);
        $this->assertModelData($fakecat_inventory, $dbcat_inventory->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cat_inventory()
    {
        $catInventory = $this->makecat_inventory();
        $resp = $this->catInventoryRepo->delete($catInventory->id);
        $this->assertTrue($resp);
        $this->assertNull(cat_inventory::find($catInventory->id), 'cat_inventory should not exist in DB');
    }
}
