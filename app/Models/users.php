<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

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
    protected $appends = ['ratetahun','ratebulan'];



    public $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'username',
        'verified',
        'id_unit_kerja',
        'nip'
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
        'password' => 'required|min:6',
        'password_confirmation' => 'required_with:password|same:password|min:6'
    ];

    public static $rulesUpdate = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'min:6',
        'password_confirmation' => 'same:password|min:6'
    ];

    public function model_has_roles()
    {
        return $this->hasOne('App\Models\model_has_roles','model_id','id');
    }

     public function inventory()
    {
        return $this->hasMany('App\Models\inventory','id_pemilik_perangkat','id')->where('is_active', 1);
    }

    public function rating()
    {
        return $this->hasMany('App\Models\rating','target_id','id');
    }

    public function unit_kerja(){
        return $this->hasOne('App\Models\unit_kerja','id','id_unit_kerja');
    }
    
    public function getRatetahunAttribute()
    {
        $roles = $this->model_has_roles()->with('roles')->first();
        if($roles['roles']['name'] == 'IT Support' || $roles['roles']['name'] == 'IT Operasional'){
            return "<span class='glyphicon glyphicon-star' style='color:orange'></span> ".substr($this->rating()->whereYear('created_at', '=', Carbon::now()->year)->avg('rate')??0,0,4);
        }
        return null;
        
    }

    public function getRatebulanAttribute()
    {
        $roles = $this->model_has_roles()->with('roles')->first();
        if($roles['roles']['name'] == 'IT Support' || $roles['roles']['name'] == 'IT Operasional'){
            return "<span class='glyphicon glyphicon-star' style='color:orange'></span> ".substr($this->rating()->whereMonth('created_at', '=', Carbon::now()->month)->avg('rate')??0,0,4);
        }
        return null;
    }

}
