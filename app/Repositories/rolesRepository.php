<?php

namespace App\Repositories;

use App\Models\roles;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class rolesRepository
 * @package App\Repositories
 * @version May 5, 2019, 5:20 am UTC
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
        'name',
        'guard_name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return roles::class;
    }
}
