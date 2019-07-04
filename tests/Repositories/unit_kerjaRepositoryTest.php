<?php namespace Tests\Repositories;

use App\Models\unit_kerja;
use App\Repositories\unit_kerjaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\Makeunit_kerjaTrait;
use Tests\ApiTestTrait;

class unit_kerjaRepositoryTest extends TestCase
{
    use Makeunit_kerjaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var unit_kerjaRepository
     */
    protected $unitKerjaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->unitKerjaRepo = \App::make(unit_kerjaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_unit_kerja()
    {
        $unitKerja = $this->fakeunit_kerjaData();
        $createdunit_kerja = $this->unitKerjaRepo->create($unitKerja);
        $createdunit_kerja = $createdunit_kerja->toArray();
        $this->assertArrayHasKey('id', $createdunit_kerja);
        $this->assertNotNull($createdunit_kerja['id'], 'Created unit_kerja must have id specified');
        $this->assertNotNull(unit_kerja::find($createdunit_kerja['id']), 'unit_kerja with given id must be in DB');
        $this->assertModelData($unitKerja, $createdunit_kerja);
    }

    /**
     * @test read
     */
    public function test_read_unit_kerja()
    {
        $unitKerja = $this->makeunit_kerja();
        $dbunit_kerja = $this->unitKerjaRepo->find($unitKerja->id);
        $dbunit_kerja = $dbunit_kerja->toArray();
        $this->assertModelData($unitKerja->toArray(), $dbunit_kerja);
    }

    /**
     * @test update
     */
    public function test_update_unit_kerja()
    {
        $unitKerja = $this->makeunit_kerja();
        $fakeunit_kerja = $this->fakeunit_kerjaData();
        $updatedunit_kerja = $this->unitKerjaRepo->update($fakeunit_kerja, $unitKerja->id);
        $this->assertModelData($fakeunit_kerja, $updatedunit_kerja->toArray());
        $dbunit_kerja = $this->unitKerjaRepo->find($unitKerja->id);
        $this->assertModelData($fakeunit_kerja, $dbunit_kerja->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_unit_kerja()
    {
        $unitKerja = $this->makeunit_kerja();
        $resp = $this->unitKerjaRepo->delete($unitKerja->id);
        $this->assertTrue($resp);
        $this->assertNull(unit_kerja::find($unitKerja->id), 'unit_kerja should not exist in DB');
    }
}
