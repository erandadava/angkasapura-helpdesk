<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class model_has_roles
 * @package App\Models
 * @version May 25, 2019, 2:34 am UTC
 *
 * @property \App\Models\Role role
 * @property \Illuminate\Database\Eloquent\Collection
 * @property string model_type
 * @property integer model_id
 */
class model_has_roles extends Model
{

    public $table = 'model_has_roles';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'model_type',
        'model_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'role_id' => 'integer',
        'model_type' => 'string',
        'model_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'role_id' => 'required',
        'model_type' => 'required',
        'model_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
     public function roles()
     {
         return $this->hasOne('App\Models\roles','id','role_id');
     }
}
