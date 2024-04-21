<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FarmTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Adjust the number inside the loop based on how many records you want
        // for ($i = 0; $i < 10; $i++) {
        //     Disease::factory()->create();
        // }
        DB::table('farm_type')->insert([
            ['type' => 'Fishery Breeding Farm', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Poultry Farm', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Piggery Farm', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Cattle Farm', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
