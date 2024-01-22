<?php

namespace Database\Seeders;
use App\Models\Farm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FarmSeeder extends Seeder
{
    public function run()
    {
        // Adjust the number inside the loop based on how many records you want
        for ($i = 0; $i < 10; $i++) {
            Farm::factory()->create();
        }
    }
}
