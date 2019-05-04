<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakerolesTrait;
use Tests\ApiTestTrait;

class rolesApiTest extends TestCase
{
    use MakerolesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_roles()
    {
        $roles = $this->fakerolesData();
        $this->response = $this->json('POST', '/api/roles', $roles);

        $this->assertApiResponse($roles);
    }

    /**
     * @test
     */
    public function test_read_roles()
    {
        $roles = $this->makeroles();
        $this->response = $this->json('GET', '/api/roles/'.$roles->id);

        $this->assertApiResponse($roles->toArray());
    }

    /**
     * @test
     */
    public function test_update_roles()
    {
        $roles = $this->makeroles();
        $editedroles = $this->fakerolesData();

        $this->response = $this->json('PUT', '/api/roles/'.$roles->id, $editedroles);

        $this->assertApiResponse($editedroles);
    }

    /**
     * @test
     */
    public function test_delete_roles()
    {
        $roles = $this->makeroles();
        $this->response = $this->json('DELETE', '/api/roles/'.$roles->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/roles/'.$roles->id);

        $this->response->assertStatus(404);
    }
}
