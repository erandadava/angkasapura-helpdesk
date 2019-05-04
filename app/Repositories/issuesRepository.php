<?php

namespace App\Repositories;

use App\Models\issues;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class issuesRepository
 * @package App\Repositories
 * @version May 4, 2019, 1:42 am UTC
 *
 * @method issues findWithoutFail($id, $columns = ['*'])
 * @method issues find($id, $columns = ['*'])
 * @method issues first($columns = ['*'])
*/
class issuesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'issue_id',
        'cat_id',
        'prio_id',
        'request_id',
        'location',
        'prob_desc',
        'reason_desc',
        'complete_by',
        'issue_date',
        'complete_date',
        'is_archive'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return issues::class;
    }
}
