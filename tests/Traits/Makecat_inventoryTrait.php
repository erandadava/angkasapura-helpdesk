<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\cat_inventory;
use App\Repositories\cat_inventoryRepository;

trait Makecat_inventoryTrait
{
    /**
     * Create fake instance of cat_inventory and save it in database
     *
     * @param array $catInventoryFields
     * @return cat_inventory
     */
    public function makecat_inventory($catInventoryFields = [])
    {
        /** @var cat_inventoryRepository $catInventoryRepo */
        $catInventoryRepo = \App::make(cat_inventoryRepository::class);
        $theme = $this->fakecat_inventoryData($catInventoryFields);
        return $catInventoryRepo->create($theme);
    }

    /**
     * Get fake instance of cat_inventory
     *
     * @param array $catInventoryFields
     * @return cat_inventory
     */
    public function fakecat_inventory($catInventoryFields = [])
    {
        return new cat_inventory($this->fakecat_inventoryData($catInventoryFields));
    }

    /**
     * Get fake data of cat_inventory
     *
     * @param array $catInventoryFields
     * @return array
     */
    public function fakecat_inventoryData($catInventoryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama_cat' => $fake->word,
            'is_active' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $catInventoryFields);
    }
}
