<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakepriorityTrait;
use Tests\ApiTestTrait;

class priorityApiTest extends TestCase
{
    use MakepriorityTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_priority()
    {
        $priority = $this->fakepriorityData();
        $this->response = $this->json('POST', '/api/priorities', $priority);

        $this->assertApiResponse($priority);
    }

    /**
     * @test
     */
    public function test_read_priority()
    {
        $priority = $this->makepriority();
        $this->response = $this->json('GET', '/api/priorities/'.$priority->id);

        $this->assertApiResponse($priority->toArray());
    }

    /**
     * @test
     */
    public function test_update_priority()
    {
        $priority = $this->makepriority();
        $editedpriority = $this->fakepriorityData();

        $this->response = $this->json('PUT', '/api/priorities/'.$priority->id, $editedpriority);

        $this->assertApiResponse($editedpriority);
    }

    /**
     * @test
     */
    public function test_delete_priority()
    {
        $priority = $this->makepriority();
        $this->response = $this->json('DELETE', '/api/priorities/'.$priority->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/priorities/'.$priority->id);

        $this->response->assertStatus(404);
    }
}
