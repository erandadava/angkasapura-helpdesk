<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\notifikasi;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) 
        {   
            if(isset(Auth::user()->id)){
                $data_notif = notifikasi::where([['user_id','=',Auth::user()->id],['status_baca','=',0]]);
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
