<?php

namespace App\Repositories;

use App\Models\inven_pembelian;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class inven_pembelianRepository
 * @package App\Repositories
 * @version July 1, 2019, 8:45 pm WIB
 *
 * @method inven_pembelian findWithoutFail($id, $columns = ['*'])
 * @method inven_pembelian find($id, $columns = ['*'])
 * @method inven_pembelian first($columns = ['*'])
*/
class inven_pembelianRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_inventory_fk',
        'nama_perangkat',
        'unit_kerja',
        'nama_alat',
        'keperluan',
        'tgl_pembelian',
        'tgl_penyerahan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return inven_pembelian::class;
    }
}
