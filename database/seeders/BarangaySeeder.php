<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Barangay;
use Illuminate\Support\Facades\DB;

class BarangaySeeder extends Seeder
{
    public function run()
    {
        // Adjust the number inside the loop based on how many records you want
        // for ($i = 0; $i < 10; $i++) {
        //     Barangay::factory()->create();
        // }
        DB::table('barangays')->insert([
            ['municipality_id' => 7, 'barangay_name' => 'Taba-ao', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Gaswiling', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Datakan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Cayapes', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Pongayan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Central', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Balakbak', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Cuba', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Boklaoan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Beleng-belis', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Labueg', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Sagubo', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Gadang', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Pudong', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Paykek', 'created_at' => now(), 'updated_at' => now()],

            ['municipality_id' => 5, 'barangay_name' => 'Tinongdan', 'created_at' => now(), 'updated_at' => now()],


        ]);
    }
}
