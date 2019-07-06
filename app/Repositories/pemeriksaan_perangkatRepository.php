<?php

namespace App\Repositories;

use App\Models\pemeriksaan_perangkat;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class pemeriksaan_perangkatRepository
 * @package App\Repositories
 * @version July 4, 2019, 4:34 pm WIB
 *
 * @method pemeriksaan_perangkat findWithoutFail($id, $columns = ['*'])
 * @method pemeriksaan_perangkat find($id, $columns = ['*'])
 * @method pemeriksaan_perangkat first($columns = ['*'])
*/
class pemeriksaan_perangkatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_pengguna_pc',
        'lokasi',
        'serial_number',
        'tanggal_pengecekan',
        'mulai_jam_pengecekan',
        'selesai_jam_pengecekan',
        'full_computer_name',
        'join_domain',
        'update_kaspersky',
        'tanggal_update',
        'tipe_koneksi',
        'tipe_ip',
        'mac_address',
        'ip_address',
        'subnet_mask',
        'gateway',
        'dns1',
        'dns2',
        'dns3',
        'ttd_it_senior',
        'ttd_admin_aps',
        'teknisi_aps',
        'user',
        'it_non_public',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return pemeriksaan_perangkat::class;
    }
}
