<?php

namespace App\Listeners;

use App\Events\CancelOrderCard;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailOnCancelOrder
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CancelOrderCard $event): void
    {
        //
    }
}
