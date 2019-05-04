<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeissuesTrait;
use Tests\ApiTestTrait;

class issuesApiTest extends TestCase
{
    use MakeissuesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_issues()
    {
        $issues = $this->fakeissuesData();
        $this->response = $this->json('POST', '/api/issues', $issues);

        $this->assertApiResponse($issues);
    }

    /**
     * @test
     */
    public function test_read_issues()
    {
        $issues = $this->makeissues();
        $this->response = $this->json('GET', '/api/issues/'.$issues->id);

        $this->assertApiResponse($issues->toArray());
    }

    /**
     * @test
     */
    public function test_update_issues()
    {
        $issues = $this->makeissues();
        $editedissues = $this->fakeissuesData();

        $this->response = $this->json('PUT', '/api/issues/'.$issues->id, $editedissues);

        $this->assertApiResponse($editedissues);
    }

    /**
     * @test
     */
    public function test_delete_issues()
    {
        $issues = $this->makeissues();
        $this->response = $this->json('DELETE', '/api/issues/'.$issues->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/issues/'.$issues->id);

        $this->response->assertStatus(404);
    }
}
