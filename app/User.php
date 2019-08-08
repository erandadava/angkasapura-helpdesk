<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Lunaweb\EmailVerification\Traits\CanVerifyEmail;
use Lunaweb\EmailVerification\Contracts\CanVerifyEmail as CanVerifyEmailContract;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements CanVerifyEmailContract
{
    public $timestamps = true;
    use Notifiable, CanVerifyEmail, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'verified', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function unit_kerja(){
        return $this->hasOne('App\Models\unit_kerja','id','id_unit_kerja');
    }

    public function model_has_roles()
    {
        return $this->hasOne('App\Models\model_has_roles','model_id','id');
    }

    public function rating()
    {
        return $this->hasMany('App\Models\rating','target_id','id');
    }
}
