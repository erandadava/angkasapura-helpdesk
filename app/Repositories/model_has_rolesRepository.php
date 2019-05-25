<?php

namespace App\Repositories;

use App\Models\model_has_roles;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class model_has_rolesRepository
 * @package App\Repositories
 * @version May 25, 2019, 2:34 am UTC
 *
 * @method model_has_roles findWithoutFail($id, $columns = ['*'])
 * @method model_has_roles find($id, $columns = ['*'])
 * @method model_has_roles first($columns = ['*'])
*/
class model_has_rolesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'model_type',
        'model_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return model_has_roles::class;
    }
}
