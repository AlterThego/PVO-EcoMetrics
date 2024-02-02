<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Disease;

class DiseaseSeeder extends Seeder
{
    public function run()
    {
        // Adjust the number inside the loop based on how many records you want
        // for ($i = 0; $i < 10; $i++) {
        //     Disease::factory()->create();
        // }
        DB::table('diseases')->insert([
            ['disease_name' => 'Rabies', 'created_at' => now(), 'updated_at' => now()],
            ['disease_name' => 'Hog Cholera', 'created_at' => now(), 'updated_at' => now()],
            ['disease_name' => 'PRRS', 'created_at' => now(), 'updated_at' => now()],
            ['disease_name' => 'Newcasle Disease', 'created_at' => now(), 'updated_at' => now()],
            ['disease_name' => 'Fowl Pox', 'created_at' => now(), 'updated_at' => now()],
            ['disease_name' => 'Blackleg', 'created_at' => now(), 'updated_at' => now()],
            ['disease_name' => 'Hemorrhagic Septicemia', 'created_at' => now(), 'updated_at' => now()],
            ['disease_name' => 'Foot and Mouth Disease', 'created_at' => now(), 'updated_at' => now()],
            ['disease_name' => 'Erysipelas', 'created_at' => now(), 'updated_at' => now()],
            ['disease_name' => 'Parvovirus', 'created_at' => now(), 'updated_at' => now()],
            ['disease_name' => 'Infectious Bursal Disease', 'created_at' => now(), 'updated_at' => now()],
            ['disease_name' => 'Infectious Bronchitis', 'created_at' => now(), 'updated_at' => now()],
            ['disease_name' => 'Internal Parasitism', 'created_at' => now(), 'updated_at' => now()],
            ['disease_name' => 'Mange', 'created_at' => now(), 'updated_at' => now()],
            ['disease_name' => 'African Swine Fever', 'created_at' => now(), 'updated_at' => now()],
            ['disease_name' => 'Avian Influenza (Bird Flu)', 'created_at' => now(), 'updated_at' => now()],

        ]);
    }
}
