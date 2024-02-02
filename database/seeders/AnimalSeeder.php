<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Animal;
use Illuminate\Support\Facades\DB;


class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Adjust the number inside the loop based on how many records you want
        // for ($i = 0; $i < 10; $i++) {
        //     Animal::factory()->create();
        // }

        DB::table('animal')->insert([
            ['animal_name' => 'Carabao', 'classification' => 'Livestock', 'created_at' => now(), 'updated_at' => now()],
            ['animal_name' => 'Cattle', 'classification' => 'Livestock', 'created_at' => now(), 'updated_at' => now()],
            ['animal_name' => 'Swine', 'classification' => 'Livestock', 'created_at' => now(), 'updated_at' => now()],
            ['animal_name' => 'Goat', 'classification' => 'Livestock', 'created_at' => now(), 'updated_at' => now()],
            ['animal_name' => 'Sheep', 'classification' => 'Livestock', 'created_at' => now(), 'updated_at' => now()],
            ['animal_name' => 'Horse', 'classification' => 'Livestock', 'created_at' => now(), 'updated_at' => now()],
            ['animal_name' => 'Duck', 'classification' => 'Livestock', 'created_at' => now(), 'updated_at' => now()],
            ['animal_name' => 'Chicken', 'classification' => 'Poultry', 'created_at' => now(), 'updated_at' => now()],
            ['animal_name' => 'Fish', 'classification' => 'Fishery', 'created_at' => now(), 'updated_at' => now()],
            ['animal_name' => 'Dog', 'classification' => 'Pet', 'created_at' => now(), 'updated_at' => now()],
            ['animal_name' => 'Cat', 'classification' => 'Pet', 'created_at' => now(), 'updated_at' => now()],

        ]);

    }
}
