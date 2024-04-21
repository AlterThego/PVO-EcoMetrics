<?php

namespace Database\Seeders;

use App\Models\AnimalType;
use Illuminate\Database\Seeder;

class MiscellaneousSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // **Only for miscellaneous classes
        $this->call(UserSeeder::class);
        $this->call(AnimalSeeder::class);
        $this->call(AnimalTypeSeeder::class);
        $this->call(FarmTypeSeeder::class);
        $this->call(FishProductionSeeder::class);
        $this->call(DiseaseSeeder::class);
        $this->call(MunicipalitySeeder::class);
        $this->call(BarangaySeeder::class);
        // $this->call(PopulationSeeder::class);

    }
}
