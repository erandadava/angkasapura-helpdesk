<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\Makecat_inventoryTrait;
use Tests\ApiTestTrait;

class cat_inventoryApiTest extends TestCase
{
    use Makecat_inventoryTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cat_inventory()
    {
        $catInventory = $this->fakecat_inventoryData();
        $this->response = $this->json('POST', '/api/catInventories', $catInventory);

        $this->assertApiResponse($catInventory);
    }

    /**
     * @test
     */
    public function test_read_cat_inventory()
    {
        $catInventory = $this->makecat_inventory();
        $this->response = $this->json('GET', '/api/catInventories/'.$catInventory->id);

        $this->assertApiResponse($catInventory->toArray());
    }

    /**
     * @test
     */
    public function test_update_cat_inventory()
    {
        $catInventory = $this->makecat_inventory();
        $editedcat_inventory = $this->fakecat_inventoryData();

        $this->response = $this->json('PUT', '/api/catInventories/'.$catInventory->id, $editedcat_inventory);

        $this->assertApiResponse($editedcat_inventory);
    }

    /**
     * @test
     */
    public function test_delete_cat_inventory()
    {
        $catInventory = $this->makecat_inventory();
        $this->response = $this->json('DELETE', '/api/catInventories/'.$catInventory->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/catInventories/'.$catInventory->id);

        $this->response->assertStatus(404);
    }
}
