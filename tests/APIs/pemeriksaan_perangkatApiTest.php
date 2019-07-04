<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\Makepemeriksaan_perangkatTrait;
use Tests\ApiTestTrait;

class pemeriksaan_perangkatApiTest extends TestCase
{
    use Makepemeriksaan_perangkatTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pemeriksaan_perangkat()
    {
        $pemeriksaanPerangkat = $this->fakepemeriksaan_perangkatData();
        $this->response = $this->json('POST', '/api/pemeriksaanPerangkats', $pemeriksaanPerangkat);

        $this->assertApiResponse($pemeriksaanPerangkat);
    }

    /**
     * @test
     */
    public function test_read_pemeriksaan_perangkat()
    {
        $pemeriksaanPerangkat = $this->makepemeriksaan_perangkat();
        $this->response = $this->json('GET', '/api/pemeriksaanPerangkats/'.$pemeriksaanPerangkat->id);

        $this->assertApiResponse($pemeriksaanPerangkat->toArray());
    }

    /**
     * @test
     */
    public function test_update_pemeriksaan_perangkat()
    {
        $pemeriksaanPerangkat = $this->makepemeriksaan_perangkat();
        $editedpemeriksaan_perangkat = $this->fakepemeriksaan_perangkatData();

        $this->response = $this->json('PUT', '/api/pemeriksaanPerangkats/'.$pemeriksaanPerangkat->id, $editedpemeriksaan_perangkat);

        $this->assertApiResponse($editedpemeriksaan_perangkat);
    }

    /**
     * @test
     */
    public function test_delete_pemeriksaan_perangkat()
    {
        $pemeriksaanPerangkat = $this->makepemeriksaan_perangkat();
        $this->response = $this->json('DELETE', '/api/pemeriksaanPerangkats/'.$pemeriksaanPerangkat->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/pemeriksaanPerangkats/'.$pemeriksaanPerangkat->id);

        $this->response->assertStatus(404);
    }
}
