<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakecategoryTrait;
use Tests\ApiTestTrait;

class categoryApiTest extends TestCase
{
    use MakecategoryTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_category()
    {
        $category = $this->fakecategoryData();
        $this->response = $this->json('POST', '/api/categories', $category);

        $this->assertApiResponse($category);
    }

    /**
     * @test
     */
    public function test_read_category()
    {
        $category = $this->makecategory();
        $this->response = $this->json('GET', '/api/categories/'.$category->id);

        $this->assertApiResponse($category->toArray());
    }

    /**
     * @test
     */
    public function test_update_category()
    {
        $category = $this->makecategory();
        $editedcategory = $this->fakecategoryData();

        $this->response = $this->json('PUT', '/api/categories/'.$category->id, $editedcategory);

        $this->assertApiResponse($editedcategory);
    }

    /**
     * @test
     */
    public function test_delete_category()
    {
        $category = $this->makecategory();
        $this->response = $this->json('DELETE', '/api/categories/'.$category->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/categories/'.$category->id);

        $this->response->assertStatus(404);
    }
}
