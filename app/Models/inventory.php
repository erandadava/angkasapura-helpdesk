<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;


/**
 * Class inventory
 * @package App\Models
 * @version May 30, 2019, 2:53 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property integer cat_id
 * @property string pos_unit
 * @property string lokasi
 * @property string nama_user
 * @property string nama_perangkat
 * @property string merk
 * @property string type_alat
 * @property string sernum
 * @property string osver
 * @property string os_license
 * @property string os_status
 * @property string av_type
 * @property string av_license
 * @property string ms_ver
 * @property string ms_id
 * @property string ms_status
 * @property string tech_key
 * @property string tech_kode
 * @property string made_in
 * @property string made_year
 * @property string vendor_name
 * @property boolean is_active
 */
class inventory extends Model
{
    use SoftDeletes;

    public $table = 'inventory';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected $appends = ['sernumid'];

    public $fillable = [
        'cat_id',
        'nama_perangkat',
        'lokasi',
        'nama_user',
        'merk',
        'type_alat',
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
        'id_pemilik_perangkat'
    ];
        /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cat_id' => 'integer',
        'nama_perangkat' => 'string',
        'lokasi' => 'string',
        'nama_user' => 'string',
        'merk' => 'string',
        'type_alat' => 'string',
        'sernum' => 'string',
        'made_in' => 'string',
        'made_year' => 'string',
        'condition' => 'float',
        'nama_perangkat_full' => 'string',
        'join_domain' => 'string',
        'update_kasp' => 'string',
        'ip_addr' => 'string',
        'mask' => 'string',
        'gateway' => 'string',
        'dns1' => 'string',
        'dns2' => 'string',
        'dns3' => 'string',
        'ip_type' => 'string',
        'conn_type' => 'string',
        'mac_addr' => 'string',
        'is_active'=> 'boolean',
];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

        'cat_id' => 'required',
        'lokasi' => 'required',
        'nama_user' => 'required',
        'nama_perangkat' => 'required',
        'merk' => 'required',
    ];

    public function cat_inventory()
    {
        return $this->hasOne('App\Models\cat_inventory','id','cat_id');
    }

    public function getSernumidAttribute()
    {
        if($this->sernum == null && $this->tech_kode != null){
            return $this->tech_kode;
        }elseif($this->sernum != null && $this->tech_kode == null){
            return $this->sernum;
        }else{
            return $this->tech_kode;
        }
    }

    public function issues()
    {
        return $this->hasMany('App\Models\issues','dev_ser_num','id');
    }
    public function issuesjml()
    {
        $now = Carbon::now();
        return $this->hasMany('App\Models\issues','dev_ser_num','id')->whereMonth('complete_date', '=', $now->month);
    }

    public function issuesjmlsla()
    {
        return $this->hasMany('App\Models\issues','dev_ser_num','id');
    }

    public function pemilik_perangkat()
    {
        return $this->hasOne('App\Models\users','id','id_pemilik_perangkat');
    }
}
