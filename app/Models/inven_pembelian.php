<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class inven_pembelian
 * @package App\Models
 * @version July 1, 2019, 8:45 pm WIB
 *
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property integer id_inventory_fk
 * @property string nama_perangkat
 * @property string unit_kerja
 * @property string nama_alat
 * @property string keperluan
 * @property string tgl_pembelian
 * @property string tgl_penyerahan
 */
class inven_pembelian extends Model
{
    // use SoftDeletes;

    public $table = 'inven_pembelian';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_inventory_fk',
        'nama_perangkat',
        'unit_kerja',
        'nama_alat',
        'keperluan',
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
        'id_inventory_fk' => 'integer',
        'nama_perangkat' => 'string',
        'unit_kerja' => 'string',
        'nama_alat' => 'string',
        'keperluan' => 'string',
        'tgl_pembelian' => 'date',
        'tgl_penyerahan' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'id_inventory_fk' => 'required',
        'nama_perangkat' => 'required',
        'unit_kerja' => 'required',
        'nama_alat' => 'required',
        'keperluan' => 'required',
        // 'tgl_pembelian' => 'required',
        'tgl_penyerahan' => 'required'
    ];


    public function inventorys()
    {
        return $this->hasMany('App\Models\inventory','id_inventory_fk','id');

    }
    
}
