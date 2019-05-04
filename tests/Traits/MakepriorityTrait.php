<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\priority;
use App\Repositories\priorityRepository;

trait MakepriorityTrait
{
    /**
     * Create fake instance of priority and save it in database
     *
     * @param array $priorityFields
     * @return priority
     */
    public function makepriority($priorityFields = [])
    {
        /** @var priorityRepository $priorityRepo */
        $priorityRepo = \App::make(priorityRepository::class);
        $theme = $this->fakepriorityData($priorityFields);
        return $priorityRepo->create($theme);
    }

    /**
     * Get fake instance of priority
     *
     * @param array $priorityFields
     * @return priority
     */
    public function fakepriority($priorityFields = [])
    {
        return new priority($this->fakepriorityData($priorityFields));
    }

    /**
     * Get fake data of priority
     *
     * @param array $priorityFields
     * @return array
     */
    public function fakepriorityData($priorityFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'prio_name' => $fake->word,
            'is_active' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $priorityFields);
    }
}
