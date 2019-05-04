<?php namespace Tests\Repositories;

use App\Models\issues;
use App\Repositories\issuesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeissuesTrait;
use Tests\ApiTestTrait;

class issuesRepositoryTest extends TestCase
{
    use MakeissuesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var issuesRepository
     */
    protected $issuesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->issuesRepo = \App::make(issuesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_issues()
    {
        $issues = $this->fakeissuesData();
        $createdissues = $this->issuesRepo->create($issues);
        $createdissues = $createdissues->toArray();
        $this->assertArrayHasKey('id', $createdissues);
        $this->assertNotNull($createdissues['id'], 'Created issues must have id specified');
        $this->assertNotNull(issues::find($createdissues['id']), 'issues with given id must be in DB');
        $this->assertModelData($issues, $createdissues);
    }

    /**
     * @test read
     */
    public function test_read_issues()
    {
        $issues = $this->makeissues();
        $dbissues = $this->issuesRepo->find($issues->id);
        $dbissues = $dbissues->toArray();
        $this->assertModelData($issues->toArray(), $dbissues);
    }

    /**
     * @test update
     */
    public function test_update_issues()
    {
        $issues = $this->makeissues();
        $fakeissues = $this->fakeissuesData();
        $updatedissues = $this->issuesRepo->update($fakeissues, $issues->id);
        $this->assertModelData($fakeissues, $updatedissues->toArray());
        $dbissues = $this->issuesRepo->find($issues->id);
        $this->assertModelData($fakeissues, $dbissues->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_issues()
    {
        $issues = $this->makeissues();
        $resp = $this->issuesRepo->delete($issues->id);
        $this->assertTrue($resp);
        $this->assertNull(issues::find($issues->id), 'issues should not exist in DB');
    }
}
