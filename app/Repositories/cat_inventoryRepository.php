<?php

namespace App\Repositories;

use App\Models\cat_inventory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class cat_inventoryRepository
 * @package App\Repositories
 * @version May 30, 2019, 2:41 am UTC
 *
 * @method cat_inventory findWithoutFail($id, $columns = ['*'])
 * @method cat_inventory find($id, $columns = ['*'])
 * @method cat_inventory first($columns = ['*'])
*/
class cat_inventoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_cat',
        'is_active'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return cat_inventory::class;
    }
}
