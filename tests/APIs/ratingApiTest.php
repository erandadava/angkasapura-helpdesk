<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeratingTrait;
use Tests\ApiTestTrait;

class ratingApiTest extends TestCase
{
    use MakeratingTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_rating()
    {
        $rating = $this->fakeratingData();
        $this->response = $this->json('POST', '/api/ratings', $rating);

        $this->assertApiResponse($rating);
    }

    /**
     * @test
     */
    public function test_read_rating()
    {
        $rating = $this->makerating();
        $this->response = $this->json('GET', '/api/ratings/'.$rating->id);

        $this->assertApiResponse($rating->toArray());
    }

    /**
     * @test
     */
    public function test_update_rating()
    {
        $rating = $this->makerating();
        $editedrating = $this->fakeratingData();

        $this->response = $this->json('PUT', '/api/ratings/'.$rating->id, $editedrating);

        $this->assertApiResponse($editedrating);
    }

    /**
     * @test
     */
    public function test_delete_rating()
    {
        $rating = $this->makerating();
        $this->response = $this->json('DELETE', '/api/ratings/'.$rating->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/ratings/'.$rating->id);

        $this->response->assertStatus(404);
    }
}
