<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class unit_kerja
 * @package App\Models
 * @version July 4, 2019, 8:28 pm WIB
 *
 * @property \Illuminate\Database\Eloquent\Collection
 * @property string nama_uk
 */
class unit_kerja extends Model
{
    use SoftDeletes;

    public $table = 'tblunitkerja';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_uk'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_uk' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_uk' => 'required'
    ];

    public function issues()
    {
        return $this->hasMany('App\Models\issues','id_unit_kerja','id');
    }

}
