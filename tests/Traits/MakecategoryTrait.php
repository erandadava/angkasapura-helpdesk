<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\category;
use App\Repositories\categoryRepository;

trait MakecategoryTrait
{
    /**
     * Create fake instance of category and save it in database
     *
     * @param array $categoryFields
     * @return category
     */
    public function makecategory($categoryFields = [])
    {
        /** @var categoryRepository $categoryRepo */
        $categoryRepo = \App::make(categoryRepository::class);
        $theme = $this->fakecategoryData($categoryFields);
        return $categoryRepo->create($theme);
    }

    /**
     * Get fake instance of category
     *
     * @param array $categoryFields
     * @return category
     */
    public function fakecategory($categoryFields = [])
    {
        return new category($this->fakecategoryData($categoryFields));
    }

    /**
     * Get fake data of category
     *
     * @param array $categoryFields
     * @return array
     */
    public function fakecategoryData($categoryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'cat_name' => $fake->word,
            'is_active' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $categoryFields);
    }
}
