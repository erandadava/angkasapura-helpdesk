<?php namespace Tests\Repositories;

use App\Models\category;
use App\Repositories\categoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakecategoryTrait;
use Tests\ApiTestTrait;

class categoryRepositoryTest extends TestCase
{
    use MakecategoryTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var categoryRepository
     */
    protected $categoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->categoryRepo = \App::make(categoryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_category()
    {
        $category = $this->fakecategoryData();
        $createdcategory = $this->categoryRepo->create($category);
        $createdcategory = $createdcategory->toArray();
        $this->assertArrayHasKey('id', $createdcategory);
        $this->assertNotNull($createdcategory['id'], 'Created category must have id specified');
        $this->assertNotNull(category::find($createdcategory['id']), 'category with given id must be in DB');
        $this->assertModelData($category, $createdcategory);
    }

    /**
     * @test read
     */
    public function test_read_category()
    {
        $category = $this->makecategory();
        $dbcategory = $this->categoryRepo->find($category->id);
        $dbcategory = $dbcategory->toArray();
        $this->assertModelData($category->toArray(), $dbcategory);
    }

    /**
     * @test update
     */
    public function test_update_category()
    {
        $category = $this->makecategory();
        $fakecategory = $this->fakecategoryData();
        $updatedcategory = $this->categoryRepo->update($fakecategory, $category->id);
        $this->assertModelData($fakecategory, $updatedcategory->toArray());
        $dbcategory = $this->categoryRepo->find($category->id);
        $this->assertModelData($fakecategory, $dbcategory->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_category()
    {
        $category = $this->makecategory();
        $resp = $this->categoryRepo->delete($category->id);
        $this->assertTrue($resp);
        $this->assertNull(category::find($category->id), 'category should not exist in DB');
    }
}
