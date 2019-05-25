<?php namespace Tests\Repositories;

use App\Models\model_has_roles;
use App\Repositories\model_has_rolesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\Makemodel_has_rolesTrait;
use Tests\ApiTestTrait;

class model_has_rolesRepositoryTest extends TestCase
{
    use Makemodel_has_rolesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var model_has_rolesRepository
     */
    protected $modelHasRolesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->modelHasRolesRepo = \App::make(model_has_rolesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_model_has_roles()
    {
        $modelHasRoles = $this->fakemodel_has_rolesData();
        $createdmodel_has_roles = $this->modelHasRolesRepo->create($modelHasRoles);
        $createdmodel_has_roles = $createdmodel_has_roles->toArray();
        $this->assertArrayHasKey('id', $createdmodel_has_roles);
        $this->assertNotNull($createdmodel_has_roles['id'], 'Created model_has_roles must have id specified');
        $this->assertNotNull(model_has_roles::find($createdmodel_has_roles['id']), 'model_has_roles with given id must be in DB');
        $this->assertModelData($modelHasRoles, $createdmodel_has_roles);
    }

    /**
     * @test read
     */
    public function test_read_model_has_roles()
    {
        $modelHasRoles = $this->makemodel_has_roles();
        $dbmodel_has_roles = $this->modelHasRolesRepo->find($modelHasRoles->id);
        $dbmodel_has_roles = $dbmodel_has_roles->toArray();
        $this->assertModelData($modelHasRoles->toArray(), $dbmodel_has_roles);
    }

    /**
     * @test update
     */
    public function test_update_model_has_roles()
    {
        $modelHasRoles = $this->makemodel_has_roles();
        $fakemodel_has_roles = $this->fakemodel_has_rolesData();
        $updatedmodel_has_roles = $this->modelHasRolesRepo->update($fakemodel_has_roles, $modelHasRoles->id);
        $this->assertModelData($fakemodel_has_roles, $updatedmodel_has_roles->toArray());
        $dbmodel_has_roles = $this->modelHasRolesRepo->find($modelHasRoles->id);
        $this->assertModelData($fakemodel_has_roles, $dbmodel_has_roles->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_model_has_roles()
    {
        $modelHasRoles = $this->makemodel_has_roles();
        $resp = $this->modelHasRolesRepo->delete($modelHasRoles->id);
        $this->assertTrue($resp);
        $this->assertNull(model_has_roles::find($modelHasRoles->id), 'model_has_roles should not exist in DB');
    }
}
