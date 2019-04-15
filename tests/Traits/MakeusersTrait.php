<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\users;
use App\Repositories\usersRepository;

trait MakeusersTrait
{
    /**
     * Create fake instance of users and save it in database
     *
     * @param array $usersFields
     * @return users
     */
    public function makeusers($usersFields = [])
    {
        /** @var usersRepository $usersRepo */
        $usersRepo = \App::make(usersRepository::class);
        $theme = $this->fakeusersData($usersFields);
        return $usersRepo->create($theme);
    }

    /**
     * Get fake instance of users
     *
     * @param array $usersFields
     * @return users
     */
    public function fakeusers($usersFields = [])
    {
        return new users($this->fakeusersData($usersFields));
    }

    /**
     * Get fake data of users
     *
     * @param array $usersFields
     * @return array
     */
    public function fakeusersData($usersFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'email' => $fake->word,
            'password' => $fake->word,
            'remember_token' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $usersFields);
    }
}
