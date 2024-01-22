<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FishProductionArea;
class FishProductionAreaSeeder extends Seeder
{
    public function run()
    {
        // Adjust the number inside the loop based on how many records you want
        for ($i = 0; $i < 10; $i++) {
            FishProductionArea::factory()->create();
        }
    }
}
