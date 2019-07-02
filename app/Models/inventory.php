<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


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
        'is_active',
        'tgl_pembelian',
        'tgl_penyerahan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cat_id' => 'integer',
        'pos_unit' => 'string',
        'lokasi' => 'string',
        'nama_user' => 'string',
        'nama_perangkat' => 'string',
        'merk' => 'string',
        'type_alat' => 'string',
        'sernum' => 'string',
        'osver' => 'string',
        'os_license' => 'string',
        'os_status' => 'string',
        'av_type' => 'string',
        'av_license' => 'string',
        'ms_ver' => 'string',
        'ms_id' => 'string',
        'ms_status' => 'string',
        'tech_key' => 'string',
        'tech_kode' => 'string',
        'made_in' => 'string',
        'made_year' => 'string',
        'vendor_name' => 'string',
        'is_active' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

        'cat_id' => 'required',
        'pos_unit' => 'required',
        'lokasi' => 'required',
        'nama_user' => 'required',
        'nama_perangkat' => 'required',
        'merk' => 'required',
        'type_alat' => 'required',
    ];

    public function cat_inventory()
    {
        return $this->hasOne('App\Models\cat_inventory','id','cat_id');
    }

    public function getSernumidAttribute()
    {
        if($this->sernum == null && $this->tech_kode != null){
            return 'Teknisi Kode : ' .$this->tech_kode;
        }elseif($this->sernum != null && $this->tech_kode == null){
            return 'Sernum : '.$this->sernum;
        }else{
            return 'Sernum : '. $this->sernum . ' | Teknisi Kode : ' . $this->tech_kode;
        }
    }
}
