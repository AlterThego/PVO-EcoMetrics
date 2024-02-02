<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AnimalType;
use Illuminate\Support\Facades\DB;

class AnimalTypeSeeder extends Seeder
{
    public function run()
    {
        // Adjust the number inside the loop based on how many records you want
        // for ($i = 0; $i < 5; $i++) {
        //     AnimalType::factory()->create();
        // }
        DB::table('animal_type')->insert([
            ['type' => 'Not Applicable', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Layers', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Broiler', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Native/Range', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Fancy/Fighting Fowl', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}