<?php namespace Tests\Repositories;

use App\Models\priority;
use App\Repositories\priorityRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakepriorityTrait;
use Tests\ApiTestTrait;

class priorityRepositoryTest extends TestCase
{
    use MakepriorityTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var priorityRepository
     */
    protected $priorityRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->priorityRepo = \App::make(priorityRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_priority()
    {
        $priority = $this->fakepriorityData();
        $createdpriority = $this->priorityRepo->create($priority);
        $createdpriority = $createdpriority->toArray();
        $this->assertArrayHasKey('id', $createdpriority);
        $this->assertNotNull($createdpriority['id'], 'Created priority must have id specified');
        $this->assertNotNull(priority::find($createdpriority['id']), 'priority with given id must be in DB');
        $this->assertModelData($priority, $createdpriority);
    }

    /**
     * @test read
     */
    public function test_read_priority()
    {
        $priority = $this->makepriority();
        $dbpriority = $this->priorityRepo->find($priority->id);
        $dbpriority = $dbpriority->toArray();
        $this->assertModelData($priority->toArray(), $dbpriority);
    }

    /**
     * @test update
     */
    public function test_update_priority()
    {
        $priority = $this->makepriority();
        $fakepriority = $this->fakepriorityData();
        $updatedpriority = $this->priorityRepo->update($fakepriority, $priority->id);
        $this->assertModelData($fakepriority, $updatedpriority->toArray());
        $dbpriority = $this->priorityRepo->find($priority->id);
        $this->assertModelData($fakepriority, $dbpriority->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_priority()
    {
        $priority = $this->makepriority();
        $resp = $this->priorityRepo->delete($priority->id);
        $this->assertTrue($resp);
        $this->assertNull(priority::find($priority->id), 'priority should not exist in DB');
    }
}
