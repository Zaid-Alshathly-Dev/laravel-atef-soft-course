<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class wellcomeUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wellcome:user {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'call ather Command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name=$this->argument('name');
        $this->call('say:hello',['name'=>$name]);
        $this->callsilent('say:hello',['name'=>$name]);
        $this->info("hello  mister ");

    }
}
