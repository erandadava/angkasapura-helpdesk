<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\inventory;
use App\Repositories\inventoryRepository;

trait MakeinventoryTrait
{
    /**
     * Create fake instance of inventory and save it in database
     *
     * @param array $inventoryFields
     * @return inventory
     */
    public function makeinventory($inventoryFields = [])
    {
        /** @var inventoryRepository $inventoryRepo */
        $inventoryRepo = \App::make(inventoryRepository::class);
        $theme = $this->fakeinventoryData($inventoryFields);
        return $inventoryRepo->create($theme);
    }

    /**
     * Get fake instance of inventory
     *
     * @param array $inventoryFields
     * @return inventory
     */
    public function fakeinventory($inventoryFields = [])
    {
        return new inventory($this->fakeinventoryData($inventoryFields));
    }

    /**
     * Get fake data of inventory
     *
     * @param array $inventoryFields
     * @return array
     */
    public function fakeinventoryData($inventoryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'cat_id' => $fake->randomDigitNotNull,
            'pos_unit' => $fake->word,
            'lokasi' => $fake->word,
            'nama_user' => $fake->word,
            'nama_perangkat' => $fake->word,
            'merk' => $fake->word,
            'type_alat' => $fake->word,
            'sernum' => $fake->word,
            'osver' => $fake->word,
            'os_license' => $fake->word,
            'os_status' => $fake->word,
            'av_type' => $fake->word,
            'av_license' => $fake->word,
            'ms_ver' => $fake->word,
            'ms_id' => $fake->word,
            'ms_status' => $fake->word,
            'tech_key' => $fake->word,
            'tech_kode' => $fake->word,
            'made_in' => $fake->word,
            'made_year' => $fake->word,
            'vendor_name' => $fake->word,
            'is_active' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $inventoryFields);
    }
}
