<?php

namespace App\Repositories;

use App\Models\priority;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class priorityRepository
 * @package App\Repositories
 * @version May 4, 2019, 1:41 am UTC
 *
 * @method priority findWithoutFail($id, $columns = ['*'])
 * @method priority find($id, $columns = ['*'])
 * @method priority first($columns = ['*'])
*/
class priorityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'prio_name',
        'is_active'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return priority::class;
    }
}
