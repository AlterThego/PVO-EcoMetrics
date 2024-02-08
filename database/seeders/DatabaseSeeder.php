<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
        $this->call(AnimalSeeder::class);
        $this->call(MunicipalitySeeder::class);
        $this->call(PopulationSeeder::class);
        $this->call(AnimalTypeSeeder::class);
        $this->call(AffectedAnimalsSeeder::class);
        $this->call(AnimalDeathSeeder::class);
        // $this->call(AnimalPopulationSeeder::class);
        $this->call(VeterinaryClinicsSeeder::class);
        $this->call(FarmSeeder::class);
        $this->call(BeeKeeperSeeder::class);
        $this->call(FarmSupplySeeder::class);
        $this->call(BarangaySeeder::class);
        $this->call(FishSanctuarySeeder::class);
        $this->call(FishProductionSeeder::class);
        $this->call(FishProductionAreaSeeder::class);
        $this->call(DiseaseSeeder::class);
        $this->call(YearlyCommonDiseaseSeeder::class);

        // Enable to test User
        $this->call(UserSeeder::class);

        //admin user 
        $admin = DB::table('users')->insert([
            'name' => "Admin",
            'email' => "admin@benguet.gov.ph",
            'email_verified_at' => now(),
            'municipality_id' => null,
            'role' => "admin",
            'password' =>  Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
    }
}
