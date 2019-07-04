<?php namespace Tests\Repositories;

use App\Models\pemeriksaan_perangkat;
use App\Repositories\pemeriksaan_perangkatRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\Makepemeriksaan_perangkatTrait;
use Tests\ApiTestTrait;

class pemeriksaan_perangkatRepositoryTest extends TestCase
{
    use Makepemeriksaan_perangkatTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var pemeriksaan_perangkatRepository
     */
    protected $pemeriksaanPerangkatRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pemeriksaanPerangkatRepo = \App::make(pemeriksaan_perangkatRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pemeriksaan_perangkat()
    {
        $pemeriksaanPerangkat = $this->fakepemeriksaan_perangkatData();
        $createdpemeriksaan_perangkat = $this->pemeriksaanPerangkatRepo->create($pemeriksaanPerangkat);
        $createdpemeriksaan_perangkat = $createdpemeriksaan_perangkat->toArray();
        $this->assertArrayHasKey('id', $createdpemeriksaan_perangkat);
        $this->assertNotNull($createdpemeriksaan_perangkat['id'], 'Created pemeriksaan_perangkat must have id specified');
        $this->assertNotNull(pemeriksaan_perangkat::find($createdpemeriksaan_perangkat['id']), 'pemeriksaan_perangkat with given id must be in DB');
        $this->assertModelData($pemeriksaanPerangkat, $createdpemeriksaan_perangkat);
    }

    /**
     * @test read
     */
    public function test_read_pemeriksaan_perangkat()
    {
        $pemeriksaanPerangkat = $this->makepemeriksaan_perangkat();
        $dbpemeriksaan_perangkat = $this->pemeriksaanPerangkatRepo->find($pemeriksaanPerangkat->id);
        $dbpemeriksaan_perangkat = $dbpemeriksaan_perangkat->toArray();
        $this->assertModelData($pemeriksaanPerangkat->toArray(), $dbpemeriksaan_perangkat);
    }

    /**
     * @test update
     */
    public function test_update_pemeriksaan_perangkat()
    {
        $pemeriksaanPerangkat = $this->makepemeriksaan_perangkat();
        $fakepemeriksaan_perangkat = $this->fakepemeriksaan_perangkatData();
        $updatedpemeriksaan_perangkat = $this->pemeriksaanPerangkatRepo->update($fakepemeriksaan_perangkat, $pemeriksaanPerangkat->id);
        $this->assertModelData($fakepemeriksaan_perangkat, $updatedpemeriksaan_perangkat->toArray());
        $dbpemeriksaan_perangkat = $this->pemeriksaanPerangkatRepo->find($pemeriksaanPerangkat->id);
        $this->assertModelData($fakepemeriksaan_perangkat, $dbpemeriksaan_perangkat->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pemeriksaan_perangkat()
    {
        $pemeriksaanPerangkat = $this->makepemeriksaan_perangkat();
        $resp = $this->pemeriksaanPerangkatRepo->delete($pemeriksaanPerangkat->id);
        $this->assertTrue($resp);
        $this->assertNull(pemeriksaan_perangkat::find($pemeriksaanPerangkat->id), 'pemeriksaan_perangkat should not exist in DB');
    }
}
