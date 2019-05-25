<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\model_has_roles;
use App\Repositories\model_has_rolesRepository;

trait Makemodel_has_rolesTrait
{
    /**
     * Create fake instance of model_has_roles and save it in database
     *
     * @param array $modelHasRolesFields
     * @return model_has_roles
     */
    public function makemodel_has_roles($modelHasRolesFields = [])
    {
        /** @var model_has_rolesRepository $modelHasRolesRepo */
        $modelHasRolesRepo = \App::make(model_has_rolesRepository::class);
        $theme = $this->fakemodel_has_rolesData($modelHasRolesFields);
        return $modelHasRolesRepo->create($theme);
    }

    /**
     * Get fake instance of model_has_roles
     *
     * @param array $modelHasRolesFields
     * @return model_has_roles
     */
    public function fakemodel_has_roles($modelHasRolesFields = [])
    {
        return new model_has_roles($this->fakemodel_has_rolesData($modelHasRolesFields));
    }

    /**
     * Get fake data of model_has_roles
     *
     * @param array $modelHasRolesFields
     * @return array
     */
    public function fakemodel_has_rolesData($modelHasRolesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'model_type' => $fake->word,
            'model_id' => $fake->word
        ], $modelHasRolesFields);
    }
}
