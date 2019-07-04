<?php

namespace App\Repositories;

use App\Models\unit_kerja;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class unit_kerjaRepository
 * @package App\Repositories
 * @version July 4, 2019, 8:28 pm WIB
 *
 * @method unit_kerja findWithoutFail($id, $columns = ['*'])
 * @method unit_kerja find($id, $columns = ['*'])
 * @method unit_kerja first($columns = ['*'])
*/
class unit_kerjaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_uk'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return unit_kerja::class;
    }
}
