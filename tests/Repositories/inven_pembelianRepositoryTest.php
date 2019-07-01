<?php namespace Tests\Repositories;

use App\Models\inven_pembelian;
use App\Repositories\inven_pembelianRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\Makeinven_pembelianTrait;
use Tests\ApiTestTrait;

class inven_pembelianRepositoryTest extends TestCase
{
    use Makeinven_pembelianTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var inven_pembelianRepository
     */
    protected $invenPembelianRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->invenPembelianRepo = \App::make(inven_pembelianRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_inven_pembelian()
    {
        $invenPembelian = $this->fakeinven_pembelianData();
        $createdinven_pembelian = $this->invenPembelianRepo->create($invenPembelian);
        $createdinven_pembelian = $createdinven_pembelian->toArray();
        $this->assertArrayHasKey('id', $createdinven_pembelian);
        $this->assertNotNull($createdinven_pembelian['id'], 'Created inven_pembelian must have id specified');
        $this->assertNotNull(inven_pembelian::find($createdinven_pembelian['id']), 'inven_pembelian with given id must be in DB');
        $this->assertModelData($invenPembelian, $createdinven_pembelian);
    }

    /**
     * @test read
     */
    public function test_read_inven_pembelian()
    {
        $invenPembelian = $this->makeinven_pembelian();
        $dbinven_pembelian = $this->invenPembelianRepo->find($invenPembelian->id);
        $dbinven_pembelian = $dbinven_pembelian->toArray();
        $this->assertModelData($invenPembelian->toArray(), $dbinven_pembelian);
    }

    /**
     * @test update
     */
    public function test_update_inven_pembelian()
    {
        $invenPembelian = $this->makeinven_pembelian();
        $fakeinven_pembelian = $this->fakeinven_pembelianData();
        $updatedinven_pembelian = $this->invenPembelianRepo->update($fakeinven_pembelian, $invenPembelian->id);
        $this->assertModelData($fakeinven_pembelian, $updatedinven_pembelian->toArray());
        $dbinven_pembelian = $this->invenPembelianRepo->find($invenPembelian->id);
        $this->assertModelData($fakeinven_pembelian, $dbinven_pembelian->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_inven_pembelian()
    {
        $invenPembelian = $this->makeinven_pembelian();
        $resp = $this->invenPembelianRepo->delete($invenPembelian->id);
        $this->assertTrue($resp);
        $this->assertNull(inven_pembelian::find($invenPembelian->id), 'inven_pembelian should not exist in DB');
    }
}
