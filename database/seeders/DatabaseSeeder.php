<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UserSeeder::class); 
        $this->call(AnimalSeeder::class);
        $this->call(DiseaseSeeder::class);
        $this->call(FarmTypeSeeder::class);
        $this->call(MunicipalitySeeder::class);
        $this->call(PopulationSeeder::class);
        $this->call(BarangaySeeder::class);
        $this->call(AnimalTypeSeeder::class);

        
        $this->call(AffectedAnimalsSeeder::class);
        $this->call(AnimalDeathSeeder::class);
        $this->call(VeterinaryClinicsSeeder::class);
        $this->call(FarmSeeder::class);
        $this->call(BeeKeeperSeeder::class);
        $this->call(FarmSupplySeeder::class);
        $this->call(FishSanctuarySeeder::class);
        $this->call(FishProductionSeeder::class);
        $this->call(FishProductionAreaSeeder::class);
        $this->call(YearlyCommonDiseaseSeeder::class);
        $this->call(AnimalPopulationSeeder::class);


    }

}
