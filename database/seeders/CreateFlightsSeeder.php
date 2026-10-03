<?php

namespace Database\Seeders;

use Database\Factories\CreateFlightsFactory;
use Illuminate\Database\Seeder;

class CreateFlightsSeeder extends Seeder
{
    public function run(): void
    {
        CreateFlightsFactory::new()->count(20)->create();
    }
}