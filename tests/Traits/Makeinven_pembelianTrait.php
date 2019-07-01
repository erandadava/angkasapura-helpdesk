<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\inven_pembelian;
use App\Repositories\inven_pembelianRepository;

trait Makeinven_pembelianTrait
{
    /**
     * Create fake instance of inven_pembelian and save it in database
     *
     * @param array $invenPembelianFields
     * @return inven_pembelian
     */
    public function makeinven_pembelian($invenPembelianFields = [])
    {
        /** @var inven_pembelianRepository $invenPembelianRepo */
        $invenPembelianRepo = \App::make(inven_pembelianRepository::class);
        $theme = $this->fakeinven_pembelianData($invenPembelianFields);
        return $invenPembelianRepo->create($theme);
    }

    /**
     * Get fake instance of inven_pembelian
     *
     * @param array $invenPembelianFields
     * @return inven_pembelian
     */
    public function fakeinven_pembelian($invenPembelianFields = [])
    {
        return new inven_pembelian($this->fakeinven_pembelianData($invenPembelianFields));
    }

    /**
     * Get fake data of inven_pembelian
     *
     * @param array $invenPembelianFields
     * @return array
     */
    public function fakeinven_pembelianData($invenPembelianFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_inventory_fk' => $fake->randomDigitNotNull,
            'nama_perangkat' => $fake->word,
            'unit_kerja' => $fake->word,
            'nama_alat' => $fake->word,
            'keperluan' => $fake->text,
            'tgl_pembelian' => $fake->word,
            'tgl_penyerahan' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $invenPembelianFields);
    }
}
