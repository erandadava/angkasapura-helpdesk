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
        'nama_perangkat',
        'lokasi',
        'nama_user',
        'merk',
        // 'type_alat',
        'sernum',
        'made_in',
        'made_year',
        'condition',
        'nama_perangkat_full',
        'join_domain',
        'update_kasp',
        'ip_addr',
        'mask',
        'gateway',
        'dns1',
        'dns2',
        'dns3',
        'ip_type',
        'conn_type',
        'mac_addr',
        'is_active',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return inventory::class;
    }
}
