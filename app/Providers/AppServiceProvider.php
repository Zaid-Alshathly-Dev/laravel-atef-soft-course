<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
use App\Events\CancelOrderCard;
use App\Listeners\SendEmailOnCancelOrder;
use Illuminate\Support\Facades\Event;



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
     Event::listen(
            CancelOrderCard::class,
            SendEmailOnCancelOrder::class
        );
    }
}
