<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\courses;

class CreateCourse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    // protected $signature = 'app:create-course';
    protected $signature = 'course:create{coursename}';

    /**
     * The console command description.
     *
     * @var string
     */
    // protected $description = 'Command description';
    protected $description = 'create a new course in table courses';

    /**
     * Execute the console command.
     */
    public function handle()
    {
    $coursename=$this->argument('coursename');
    courses::create(['name'=>$coursename]);
    dump("the course called $coursename created ");
    }
}
