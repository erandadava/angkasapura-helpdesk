<?php

namespace App\Repositories;

use App\Models\category;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class categoryRepository
 * @package App\Repositories
 * @version May 4, 2019, 12:40 am UTC
 *
 * @method category findWithoutFail($id, $columns = ['*'])
 * @method category find($id, $columns = ['*'])
 * @method category first($columns = ['*'])
*/
class categoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cat_name',
        'is_active'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return category::class;
    }
}
