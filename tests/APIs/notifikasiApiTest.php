<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakenotifikasiTrait;
use Tests\ApiTestTrait;

class notifikasiApiTest extends TestCase
{
    use MakenotifikasiTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_notifikasi()
    {
        $notifikasi = $this->fakenotifikasiData();
        $this->response = $this->json('POST', '/api/notifikasis', $notifikasi);

        $this->assertApiResponse($notifikasi);
    }

    /**
     * @test
     */
    public function test_read_notifikasi()
    {
        $notifikasi = $this->makenotifikasi();
        $this->response = $this->json('GET', '/api/notifikasis/'.$notifikasi->id);

        $this->assertApiResponse($notifikasi->toArray());
    }

    /**
     * @test
     */
    public function test_update_notifikasi()
    {
        $notifikasi = $this->makenotifikasi();
        $editednotifikasi = $this->fakenotifikasiData();

        $this->response = $this->json('PUT', '/api/notifikasis/'.$notifikasi->id, $editednotifikasi);

        $this->assertApiResponse($editednotifikasi);
    }

    /**
     * @test
     */
    public function test_delete_notifikasi()
    {
        $notifikasi = $this->makenotifikasi();
        $this->response = $this->json('DELETE', '/api/notifikasis/'.$notifikasi->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/notifikasis/'.$notifikasi->id);

        $this->response->assertStatus(404);
    }
}
