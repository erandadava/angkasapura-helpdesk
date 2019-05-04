<?php namespace Tests\Repositories;

use App\Models\rating;
use App\Repositories\ratingRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeratingTrait;
use Tests\ApiTestTrait;

class ratingRepositoryTest extends TestCase
{
    use MakeratingTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ratingRepository
     */
    protected $ratingRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->ratingRepo = \App::make(ratingRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_rating()
    {
        $rating = $this->fakeratingData();
        $createdrating = $this->ratingRepo->create($rating);
        $createdrating = $createdrating->toArray();
        $this->assertArrayHasKey('id', $createdrating);
        $this->assertNotNull($createdrating['id'], 'Created rating must have id specified');
        $this->assertNotNull(rating::find($createdrating['id']), 'rating with given id must be in DB');
        $this->assertModelData($rating, $createdrating);
    }

    /**
     * @test read
     */
    public function test_read_rating()
    {
        $rating = $this->makerating();
        $dbrating = $this->ratingRepo->find($rating->id);
        $dbrating = $dbrating->toArray();
        $this->assertModelData($rating->toArray(), $dbrating);
    }

    /**
     * @test update
     */
    public function test_update_rating()
    {
        $rating = $this->makerating();
        $fakerating = $this->fakeratingData();
        $updatedrating = $this->ratingRepo->update($fakerating, $rating->id);
        $this->assertModelData($fakerating, $updatedrating->toArray());
        $dbrating = $this->ratingRepo->find($rating->id);
        $this->assertModelData($fakerating, $dbrating->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_rating()
    {
        $rating = $this->makerating();
        $resp = $this->ratingRepo->delete($rating->id);
        $this->assertTrue($resp);
        $this->assertNull(rating::find($rating->id), 'rating should not exist in DB');
    }
}
