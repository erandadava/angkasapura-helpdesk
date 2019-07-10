<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class pemeriksaan_perangkat
 * @package App\Models
 * @version July 4, 2019, 4:34 pm WIB
 *
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property string nama_pengguna_pc
 * @property string lokasi
 * @property string serial_number
 * @property string tanggal_pengecekan
 * @property time mulai_jam_pengecekan
 * @property time selesai_jam_pengecekan
 * @property string full_computer_name
 * @property boolean join_domain
 * @property boolean update_kaspersky
 * @property string tanggal_update
 * @property string tipe_koneksi
 * @property string tipe_ip
 * @property string mac_address
 * @property string ip_address
 * @property string subnet_mask
 * @property string gateway
 * @property string dns1
 * @property string dns2
 * @property string dns3
 * @property string ttd_it_senior
 * @property string ttd_admin_aps
 * @property string teknisi_aps
 * @property string user
 * @property string it_non_public
 */
class pemeriksaan_perangkat extends Model
{
    use SoftDeletes;

    public $table = 'tblpemeriksaanperangkat';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $appends = ['Foto'];

    public $fillable = [
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
        'foto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_pengguna_pc' => 'string',
        'lokasi' => 'string',
        'serial_number' => 'string',
        'tanggal_pengecekan' => 'date',
        'full_computer_name' => 'string',
        'join_domain' => 'boolean',
        'update_kaspersky' => 'boolean',
        'tanggal_update' => 'date',
        'tipe_koneksi' => 'string',
        'tipe_ip' => 'string',
        'mac_address' => 'string',
        'ip_address' => 'string',
        'subnet_mask' => 'string',
        'gateway' => 'string',
        'dns1' => 'string',
        'dns2' => 'string',
        'dns3' => 'string',
        'ttd_it_senior' => 'string',
        'ttd_admin_aps' => 'string',
        'teknisi_aps' => 'string',
        'user' => 'string',
        'it_non_public' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'foto.*' => 'mimes:jpg,jpeg,png',
        'foto' => 'max:3',
    ];

    public function getFotoAttribute()
    {
        if(isset($this->attributes['foto'])){
            return unserialize($this->attributes['foto']);
        }
        return null;
    }
}
