<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    

    /**
    * @method static \Illuminate\Http\Response|mixed caps(string $value)
    */
    public function boot(): void
    {
    Response::macro('caps', function(String $value){
return Response::make(strtoupper($value));
    });
    }
}
