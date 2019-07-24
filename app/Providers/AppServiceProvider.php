<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\notifikasi;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRole;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('H:i:s', time());
        $this->data['status_jam'] = 0;
        if($date >= '17:30:00'){
            $this->data['status_jam'] = 1;
        }
        request()->merge(['status_jam' => $this->data['status_jam']]);

        view()->composer('*', function ($view) 
        {   
            if(isset(Auth::user()->id)){
                $usernya = Auth::user()->getRoleNames();
                if(($usernya[0] == "IT Administrator") || ($usernya[0] == "IT Support" && $this->data['status_jam'] == 1)){
                    $data_notif = notifikasi::where([['user_id','=',null],['status_baca','=',0]])->orWhere([['user_id','=',Auth::user()->id],['status_baca','=',0]]);
                }else{
                    $data_notif = notifikasi::where([['user_id','=',Auth::user()->id],['status_baca','=',0]]);
                }
                
                $this->data['count_notif'] = $data_notif->count();
                $this->data['data_notif'] = $data_notif->get();
                $view->with($this->data);   
            } 
        });  
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
