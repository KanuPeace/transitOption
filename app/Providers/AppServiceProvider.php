<?php

namespace App\Providers;

use App\Traits\Constants;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    use Constants;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength('191');
        view()->composer('*',function($view){
            $view->with([

                'favicon_img' => url('/').env('ASSET_URL').'/logo.png',
                'logo_img' => url('/').env('ASSET_URL').'/logo.png',
                'web_source' => url('/').env('ASSET_URL').'/web',
                'admin_source' => url('/').env('ASSET_URL').'/dashboard',
                'activeStatus' => $this->activeStatus,
                'inactiveStatus' => $this->inactiveStatus,
            ]);
        });
    }
}
