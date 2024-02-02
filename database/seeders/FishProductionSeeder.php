<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FishProduction;
use Illuminate\Support\Facades\DB;

class FishProductionSeeder extends Seeder
{
    public function run()
    {
        // Adjust the number inside the loop based on how many records you want
        // for ($i = 0; $i < 10; $i++) {
        //     FishProduction::factory()->create();
        // }
        DB::table('fish_productions')->insert([
            ['type' => 'Fish in Pond', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Fish Cage', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Fish in Tank', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Rice-Fish Culture', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Communal Bodies of Water', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
