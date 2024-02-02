<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Municipality;
use Illuminate\Support\Facades\DB;


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
        // for ($i = 0; $i < 10; $i++) {
        //     Municipality::factory()->create();
        // }

        DB::table('municipalities')->insert([
            ['municipality_name' => 'Atok', 'zip_code' => '2612', 'land_area' => 214.99, 'created_at' => now(), 'updated_at' => now()],
            ['municipality_name' => 'Bakun', 'zip_code' => '2610', 'land_area' => 286.91, 'created_at' => now(), 'updated_at' => now()],
            ['municipality_name' => 'Bokod', 'zip_code' => '2605', 'land_area' => 274.96, 'created_at' => now(), 'updated_at' => now()],
            ['municipality_name' => 'Buguias', 'zip_code' => '2607', 'land_area' => 175.88, 'created_at' => now(), 'updated_at' => now()],
            ['municipality_name' => 'Itogon', 'zip_code' => '2604', 'land_area' => 449.73, 'created_at' => now(), 'updated_at' => now()],
            ['municipality_name' => 'Kabayan', 'zip_code' => '2606', 'land_area' => 242.69, 'created_at' => now(), 'updated_at' => now()],
            ['municipality_name' => 'Kapangan', 'zip_code' => '2613', 'land_area' => 164.39, 'created_at' => now(), 'updated_at' => now()],
            ['municipality_name' => 'Kibungan', 'zip_code' => '2611', 'land_area' => 254.86, 'created_at' => now(), 'updated_at' => now()],
            ['municipality_name' => 'La Trinidad', 'zip_code' => '2601', 'land_area' => 70.04, 'created_at' => now(), 'updated_at' => now()],
            ['municipality_name' => 'Mankayan', 'zip_code' => '2608', 'land_area' => 130.48, 'created_at' => now(), 'updated_at' => now()],
            ['municipality_name' => 'Sablan', 'zip_code' => '2614', 'land_area' => 105.63, 'created_at' => now(), 'updated_at' => now()],
            ['municipality_name' => 'Tuba', 'zip_code' => '2603', 'land_area' => 295.97, 'created_at' => now(), 'updated_at' => now()],
            ['municipality_name' => 'Tublay', 'zip_code' => '2615', 'land_area' => 102.55, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
