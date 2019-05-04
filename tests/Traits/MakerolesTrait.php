<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\roles;
use App\Repositories\rolesRepository;

trait MakerolesTrait
{
    /**
     * Create fake instance of roles and save it in database
     *
     * @param array $rolesFields
     * @return roles
     */
    public function makeroles($rolesFields = [])
    {
        /** @var rolesRepository $rolesRepo */
        $rolesRepo = \App::make(rolesRepository::class);
        $theme = $this->fakerolesData($rolesFields);
        return $rolesRepo->create($theme);
    }

    /**
     * Get fake instance of roles
     *
     * @param array $rolesFields
     * @return roles
     */
    public function fakeroles($rolesFields = [])
    {
        return new roles($this->fakerolesData($rolesFields));
    }

    /**
     * Get fake data of roles
     *
     * @param array $rolesFields
     * @return array
     */
    public function fakerolesData($rolesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'role_name' => $fake->word,
            'is_active' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $rolesFields);
    }
}
