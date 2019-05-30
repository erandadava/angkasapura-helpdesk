<?php

namespace App\Repositories;

use App\Models\inventory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class inventoryRepository
 * @package App\Repositories
 * @version May 30, 2019, 2:53 am UTC
 *
 * @method inventory findWithoutFail($id, $columns = ['*'])
 * @method inventory find($id, $columns = ['*'])
 * @method inventory first($columns = ['*'])
*/
class inventoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cat_id',
        'pos_unit',
        'lokasi',
        'nama_user',
        'nama_perangkat',
        'merk',
        'type_alat',
        'sernum',
        'osver',
        'os_license',
        'os_status',
        'av_type',
        'av_license',
        'ms_ver',
        'ms_id',
        'ms_status',
        'tech_key',
        'tech_kode',
        'made_in',
        'made_year',
        'vendor_name',
        'is_active'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return inventory::class;
    }
}
