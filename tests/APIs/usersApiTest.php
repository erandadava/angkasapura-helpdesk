<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeusersTrait;
use Tests\ApiTestTrait;

class usersApiTest extends TestCase
{
    use MakeusersTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_users()
    {
        $users = $this->fakeusersData();
        $this->response = $this->json('POST', '/api/users', $users);

        $this->assertApiResponse($users);
    }

    /**
     * @test
     */
    public function test_read_users()
    {
        $users = $this->makeusers();
        $this->response = $this->json('GET', '/api/users/'.$users->id);

        $this->assertApiResponse($users->toArray());
    }

    /**
     * @test
     */
    public function test_update_users()
    {
        $users = $this->makeusers();
        $editedusers = $this->fakeusersData();

        $this->response = $this->json('PUT', '/api/users/'.$users->id, $editedusers);

        $this->assertApiResponse($editedusers);
    }

    /**
     * @test
     */
    public function test_delete_users()
    {
        $users = $this->makeusers();
        $this->response = $this->json('DELETE', '/api/users/'.$users->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/users/'.$users->id);

        $this->response->assertStatus(404);
    }
}
