<?php

namespace App\Repositories;

use App\Models\rating;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ratingRepository
 * @package App\Repositories
 * @version May 4, 2019, 1:42 am UTC
 *
 * @method rating findWithoutFail($id, $columns = ['*'])
 * @method rating find($id, $columns = ['*'])
 * @method rating first($columns = ['*'])
*/
class ratingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'rate'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return rating::class;
    }
}
