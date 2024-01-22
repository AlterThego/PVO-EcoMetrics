<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Municipality;



class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Adjust the number inside the loop based on how many records you want
        for ($i = 0; $i < 10; $i++) {
            Municipality::factory()->create();
        }
    }
}
