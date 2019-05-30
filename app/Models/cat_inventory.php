<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class cat_inventory
 * @package App\Models
 * @version May 30, 2019, 2:41 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property string nama_cat
 * @property boolean is_active
 */
class cat_inventory extends Model
{
    use SoftDeletes;

    public $table = 'cat_inventory';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_cat',
        'is_active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_cat' => 'string',
        'is_active' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function inventory()
    {
        return $this->hasMany('App\Models\inventory','cat_id','id')->where('is_active', 1);
    }
}
