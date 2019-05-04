<?php

namespace App\Repositories;

use App\Models\roles;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class rolesRepository
 * @package App\Repositories
 * @version May 4, 2019, 4:19 pm UTC
 *
 * @method roles findWithoutFail($id, $columns = ['*'])
 * @method roles find($id, $columns = ['*'])
 * @method roles first($columns = ['*'])
*/
class rolesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'role_name',
        'is_active'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return roles::class;
    }
}
