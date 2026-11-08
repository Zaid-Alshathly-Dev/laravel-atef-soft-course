<?php

namespace App\Listeners;

use App\Events\courseAddEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue; 
use Illuminate\Support\Facades\DB;


class courseAddListener implements ShouldQueue
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
    public function handle(courseAddEvent $event): void
    {
        DB::table('messages')->insert([
            'message' => "تم اضافة كورس جديد باسم ".$event->course,
            'created_at' => now()
            
        ]);
    }

   
    
}
