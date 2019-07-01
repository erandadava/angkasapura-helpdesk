<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\Makeinven_pembelianTrait;
use Tests\ApiTestTrait;

class inven_pembelianApiTest extends TestCase
{
    use Makeinven_pembelianTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_inven_pembelian()
    {
        $invenPembelian = $this->fakeinven_pembelianData();
        $this->response = $this->json('POST', '/api/invenPembelians', $invenPembelian);

        $this->assertApiResponse($invenPembelian);
    }

    /**
     * @test
     */
    public function test_read_inven_pembelian()
    {
        $invenPembelian = $this->makeinven_pembelian();
        $this->response = $this->json('GET', '/api/invenPembelians/'.$invenPembelian->id);

        $this->assertApiResponse($invenPembelian->toArray());
    }

    /**
     * @test
     */
    public function test_update_inven_pembelian()
    {
        $invenPembelian = $this->makeinven_pembelian();
        $editedinven_pembelian = $this->fakeinven_pembelianData();

        $this->response = $this->json('PUT', '/api/invenPembelians/'.$invenPembelian->id, $editedinven_pembelian);

        $this->assertApiResponse($editedinven_pembelian);
    }

    /**
     * @test
     */
    public function test_delete_inven_pembelian()
    {
        $invenPembelian = $this->makeinven_pembelian();
        $this->response = $this->json('DELETE', '/api/invenPembelians/'.$invenPembelian->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/invenPembelians/'.$invenPembelian->id);

        $this->response->assertStatus(404);
    }
}
