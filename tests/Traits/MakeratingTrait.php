<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\rating;
use App\Repositories\ratingRepository;

trait MakeratingTrait
{
    /**
     * Create fake instance of rating and save it in database
     *
     * @param array $ratingFields
     * @return rating
     */
    public function makerating($ratingFields = [])
    {
        /** @var ratingRepository $ratingRepo */
        $ratingRepo = \App::make(ratingRepository::class);
        $theme = $this->fakeratingData($ratingFields);
        return $ratingRepo->create($theme);
    }

    /**
     * Get fake instance of rating
     *
     * @param array $ratingFields
     * @return rating
     */
    public function fakerating($ratingFields = [])
    {
        return new rating($this->fakeratingData($ratingFields));
    }

    /**
     * Get fake data of rating
     *
     * @param array $ratingFields
     * @return array
     */
    public function fakeratingData($ratingFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'rate' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $ratingFields);
    }
}
