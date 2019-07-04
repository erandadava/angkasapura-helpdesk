<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\Makeunit_kerjaTrait;
use Tests\ApiTestTrait;

class unit_kerjaApiTest extends TestCase
{
    use Makeunit_kerjaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_unit_kerja()
    {
        $unitKerja = $this->fakeunit_kerjaData();
        $this->response = $this->json('POST', '/api/unitKerjas', $unitKerja);

        $this->assertApiResponse($unitKerja);
    }

    /**
     * @test
     */
    public function test_read_unit_kerja()
    {
        $unitKerja = $this->makeunit_kerja();
        $this->response = $this->json('GET', '/api/unitKerjas/'.$unitKerja->id);

        $this->assertApiResponse($unitKerja->toArray());
    }

    /**
     * @test
     */
    public function test_update_unit_kerja()
    {
        $unitKerja = $this->makeunit_kerja();
        $editedunit_kerja = $this->fakeunit_kerjaData();

        $this->response = $this->json('PUT', '/api/unitKerjas/'.$unitKerja->id, $editedunit_kerja);

        $this->assertApiResponse($editedunit_kerja);
    }

    /**
     * @test
     */
    public function test_delete_unit_kerja()
    {
        $unitKerja = $this->makeunit_kerja();
        $this->response = $this->json('DELETE', '/api/unitKerjas/'.$unitKerja->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/unitKerjas/'.$unitKerja->id);

        $this->response->assertStatus(404);
    }
}
