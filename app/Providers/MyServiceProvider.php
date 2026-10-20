<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\HelperService;
 

class MyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //تسجيل الخدمات هنا يتم 
    //     $this->app->bind('helper',function(){
    // return new \App\Services\HelperService;
    //     });
        $this->app->singleton(HelperService::class,function(){
    return new HelperService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //يتم تنفيذ اي خدمه هنا بعد ما يتم تسجيها 
    }
}
