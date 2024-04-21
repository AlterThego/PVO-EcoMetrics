<?php

namespace Database\Seeders;

use App\Models\AnimalPopulation;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalPopulationSeeder extends Seeder
{
    public function run()
    {
        // Adjust the number inside the loop based on how many records you want
        for ($i = 0; $i < 1000; $i++) {
            AnimalPopulation::factory()->create();
        }
    }
}
