<?php

namespace App\Models;
use Carbon\Carbon;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class issues
 * @package App\Models
 * @version May 4, 2019, 1:42 am UTC
 *
 * @property string issue_id
 * @property integer cat_id
 * @property integer prio_id
 * @property integer request_id
 * @property string location
 * @property string prob_desc
 * @property string reason_desc
 * @property integer complete_by
 * @property string|\Carbon\Carbon issue_date
 * @property string|\Carbon\Carbon complete_date
 * @property boolean is_archive
 */
class issues extends Model
{
    use SoftDeletes;

    public $table = 'issues';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected $appends = ['statusalert'];

    public $fillable = [
        'issue_id',
        'cat_id',
        'prio_id',
        'request_id',
        'location',
        'prob_desc',
        'reason_desc',
        'complete_by',
        'issue_date',
        'complete_date',
        'is_archive',
        'status',
        'solution_desc',
        'assign_it_support',
        'assign_it_ops',
        'dev_ser_num',
        'other_device',
        'id_unit_kerja',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'issue_id' => 'string',
        'cat_id' => 'integer',
        'prio_id' => 'integer',
        'request_id' => 'integer',
        'location' => 'string',
        'prob_desc' => 'string',
        'reason_desc' => 'string',
        'complete_by' => 'integer',
        'issue_date' => 'datetime',
        'complete_date' => 'datetime',
        'is_archive' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function category()
    {
        return $this->hasOne('App\Models\category','id','cat_id');
    }

    public function priority()
    {
        return $this->hasOne('App\Models\priority','id','prio_id');
    }

    public function request()
    {
        return $this->hasOne('App\User','id','request_id');
    }

    public function complete()
    {
        return $this->hasOne('App\User','id','complete_by');
    }

    public function assign_it_support_relation()
    {
        return $this->hasOne('App\User','id','assign_it_support');
    }

    public function assign_it_ops_relation()
    {
        return $this->hasOne('App\User','id','assign_it_ops');
    }
    public function rating()
    {
        return $this->hasOne('App\Models\rating','issues_id','id');
    }
    public function sernum()
    {
        return $this->hasOne('App\Models\inventory','id','dev_ser_num');
    }

    public function unit_kerja(){
        return $this->hasOne('App\Models\unit_kerja','id','id_unit_kerja');
    }

    public function getStatusalertAttribute()
    {
        $time = $this->priority()->first()->alert_time;
        $status = 0;
        if($this->status == null){
            $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $this->issue_date);
            $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Carbon::now());
            $diff_in_minutes = $to->diff($from);
            
            $selisih = \Carbon\Carbon::createFromTime(0, $diff_in_minutes->s, $diff_in_minutes->i);
            $waktu_issue = \Carbon\Carbon::createFromFormat('H:i:s', $this->priority()->first()->alert_time);
            
            if($selisih >= $waktu_issue){
                $status = 1;
            }
            return $status;
        }
    }

    public function inventory()
    {
        return $this->hasOne('App\Models\inventory','id','sernum');
    }
}
