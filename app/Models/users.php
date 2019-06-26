<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class users
 * @package App\Models
 * @version April 15, 2019, 2:07 pm UTC
 *
 * @property string name
 * @property string email
 * @property string password
 * @property string remember_token
 */
class users extends Model
{

    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'username',
        'verified'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'username' => 'string',
        'email' => 'string',
        'password' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required'
    ];

    public function model_has_roles()
    {
        return $this->hasOne('App\Models\model_has_roles','model_id','id');
    }

}
