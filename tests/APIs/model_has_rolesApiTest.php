<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\Makemodel_has_rolesTrait;
use Tests\ApiTestTrait;

class model_has_rolesApiTest extends TestCase
{
    use Makemodel_has_rolesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_model_has_roles()
    {
        $modelHasRoles = $this->fakemodel_has_rolesData();
        $this->response = $this->json('POST', '/api/modelHasRoles', $modelHasRoles);

        $this->assertApiResponse($modelHasRoles);
    }

    /**
     * @test
     */
    public function test_read_model_has_roles()
    {
        $modelHasRoles = $this->makemodel_has_roles();
        $this->response = $this->json('GET', '/api/modelHasRoles/'.$modelHasRoles->id);

        $this->assertApiResponse($modelHasRoles->toArray());
    }

    /**
     * @test
     */
    public function test_update_model_has_roles()
    {
        $modelHasRoles = $this->makemodel_has_roles();
        $editedmodel_has_roles = $this->fakemodel_has_rolesData();

        $this->response = $this->json('PUT', '/api/modelHasRoles/'.$modelHasRoles->id, $editedmodel_has_roles);

        $this->assertApiResponse($editedmodel_has_roles);
    }

    /**
     * @test
     */
    public function test_delete_model_has_roles()
    {
        $modelHasRoles = $this->makemodel_has_roles();
        $this->response = $this->json('DELETE', '/api/modelHasRoles/'.$modelHasRoles->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/modelHasRoles/'.$modelHasRoles->id);

        $this->response->assertStatus(404);
    }
}
