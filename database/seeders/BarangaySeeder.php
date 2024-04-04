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

            // Atok id = 1            
            ['municipality_id' => 1, 'barangay_name' => 'Abiang', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 1, 'barangay_name' => 'Caliking', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 1, 'barangay_name' => 'Cattubo', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 1, 'barangay_name' => 'Naguey', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 1, 'barangay_name' => 'Paoay', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 1, 'barangay_name' => 'Pasdong', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 1, 'barangay_name' => 'Poblacion(Atok)', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 1, 'barangay_name' => 'Topdac', 'created_at' => now(), 'updated_at' => now()],

            // Bakun id = 2           
            ['municipality_id' => 2, 'barangay_name' => 'Ampusongan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 2, 'barangay_name' => 'Bagu', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 2, 'barangay_name' => 'Dalipey', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 2, 'barangay_name' => 'Gambang', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 2, 'barangay_name' => 'Kayapa', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 2, 'barangay_name' => 'Poblacion(Bakun)', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 2, 'barangay_name' => 'Sinacbat', 'created_at' => now(), 'updated_at' => now()],

            // Bokod id = 3           
            ['municipality_id' => 3, 'barangay_name' => 'Ambuclao', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 3, 'barangay_name' => 'Bila', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 3, 'barangay_name' => 'Bobok-Bisal', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 3, 'barangay_name' => 'Daclan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 3, 'barangay_name' => 'Ekip', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 3, 'barangay_name' => 'Karao', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 3, 'barangay_name' => 'Nawal', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 3, 'barangay_name' => 'Pito', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 3, 'barangay_name' => 'Poblacion(Bokod)', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 3, 'barangay_name' => 'Tikey', 'created_at' => now(), 'updated_at' => now()],


            // Buguias id = 4          
            ['municipality_id' => 4, 'barangay_name' => 'Abatan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 4, 'barangay_name' => 'Amgaleyguey', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 4, 'barangay_name' => 'Amlimay', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 4, 'barangay_name' => 'Baculongan Norte', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 4, 'barangay_name' => 'Baculongan Sur', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 4, 'barangay_name' => 'Bangao', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 4, 'barangay_name' => 'Buyacaoan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 4, 'barangay_name' => 'Calamagan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 4, 'barangay_name' => 'Catlubong', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 4, 'barangay_name' => 'Lengaoan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 4, 'barangay_name' => 'Loo', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 4, 'barangay_name' => 'Natubleng', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 4, 'barangay_name' => 'Poblacion(Buguias)', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 4, 'barangay_name' => 'Sebang', 'created_at' => now(), 'updated_at' => now()],

            // Itogon id = 5
            ['municipality_id' => 5, 'barangay_name' => 'Ampucao', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 5, 'barangay_name' => 'Dalupirip', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 5, 'barangay_name' => 'Gumatdang', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 5, 'barangay_name' => 'Loacan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 5, 'barangay_name' => 'Poblacion (Itogon)', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 5, 'barangay_name' => 'Tinongdan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 5, 'barangay_name' => 'Tuding', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 5, 'barangay_name' => 'Ucab', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 5, 'barangay_name' => 'Virac', 'created_at' => now(), 'updated_at' => now()],


            // Kabayan id = 6
            ['municipality_id' => 6, 'barangay_name' => 'Adaoay', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 6, 'barangay_name' => 'Anchokey', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 6, 'barangay_name' => 'Ballay', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 6, 'barangay_name' => 'Bashoy', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 6, 'barangay_name' => 'Batan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 6, 'barangay_name' => 'Duacan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 6, 'barangay_name' => 'Eddet', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 6, 'barangay_name' => 'Gusaran', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 6, 'barangay_name' => 'Kabayan Barrio', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 6, 'barangay_name' => 'Lusod', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 6, 'barangay_name' => 'Pacso', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 6, 'barangay_name' => 'Poblacion (Kabayan)', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 6, 'barangay_name' => 'Tawangan', 'created_at' => now(), 'updated_at' => now()],


            // Itogon id = 7 
            ['municipality_id' => 7, 'barangay_name' => 'Balakbak', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Beleng-belis', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Boklaoan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Cayapes', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Cuba', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Datakan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Gadang', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Gaswiling', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Labueg', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Paykek', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Poblacion (Itogon)', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Pongayan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Pudong', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Sagubo', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 7, 'barangay_name' => 'Taba-ao', 'created_at' => now(), 'updated_at' => now()],


            // Kibungan id = 8
            ['municipality_id' => 8, 'barangay_name' => 'Badeo', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 8, 'barangay_name' => 'Lubo', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 8, 'barangay_name' => 'Madaymen', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 8, 'barangay_name' => 'Palina', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 8, 'barangay_name' => 'Poblacion (Kibungan)', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 8, 'barangay_name' => 'Sagpat', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 8, 'barangay_name' => 'Tacadang', 'created_at' => now(), 'updated_at' => now()],


            // La Trinidad id = 9
            ['municipality_id' => 9, 'barangay_name' => 'Alapang', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 9, 'barangay_name' => 'Alno', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 9, 'barangay_name' => 'Ambiong', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 9, 'barangay_name' => 'Bahong', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 9, 'barangay_name' => 'Balili (La Trinidad)', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 9, 'barangay_name' => 'Beckel', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 9, 'barangay_name' => 'Betag', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 9, 'barangay_name' => 'Bineng', 'created_at' => now(), 'updated_at' => now()],

            ['municipality_id' => 9, 'barangay_name' => 'Cruz', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 9, 'barangay_name' => 'Lubas', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 9, 'barangay_name' => 'Pico', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 9, 'barangay_name' => 'Poblacion (La Trinidad)', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 9, 'barangay_name' => 'Puguis', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 9, 'barangay_name' => 'Shilan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 9, 'barangay_name' => 'Tawang', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 9, 'barangay_name' => 'Wangal', 'created_at' => now(), 'updated_at' => now()],

            // Mankayan id = 10 
            ['municipality_id' => 10, 'barangay_name' => 'Balili (Mankayan)', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 10, 'barangay_name' => 'Bedbed', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 10, 'barangay_name' => 'Bulalacao', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 10, 'barangay_name' => 'Cabiten', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 10, 'barangay_name' => 'Colalo', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 10, 'barangay_name' => 'Guinaoang', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 10, 'barangay_name' => 'Paco', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 10, 'barangay_name' => 'Palasaan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 10, 'barangay_name' => 'Poblacion (Mankayan)', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 10, 'barangay_name' => 'Sapid', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 10, 'barangay_name' => 'Tabio', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 10, 'barangay_name' => 'Taneg', 'created_at' => now(), 'updated_at' => now()],

            // Sablan id = 11
            ['municipality_id' => 11, 'barangay_name' => 'Bagong', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 11, 'barangay_name' => 'Balluay', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 11, 'barangay_name' => 'Banangan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 11, 'barangay_name' => 'Banengbeng', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 11, 'barangay_name' => 'Bayabas', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 11, 'barangay_name' => 'Kamog', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 11, 'barangay_name' => 'Pappa', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 11, 'barangay_name' => 'Poblacion (Sablan)', 'created_at' => now(), 'updated_at' => now()],


            // Tuba id = 12
            ['municipality_id' => 12, 'barangay_name' => 'Ansagan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 12, 'barangay_name' => 'Camp 1', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 12, 'barangay_name' => 'Camp 3', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 12, 'barangay_name' => 'Camp 4', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 12, 'barangay_name' => 'Nangalisan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 12, 'barangay_name' => 'Poblacion (Tuba)', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 12, 'barangay_name' => 'San Pascual', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 12, 'barangay_name' => 'Tabaan Norte', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 12, 'barangay_name' => 'Tabaan Sur', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 12, 'barangay_name' => 'Tadiangan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 12, 'barangay_name' => 'Taloy Norte', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 12, 'barangay_name' => 'Taloy Sur', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 12, 'barangay_name' => 'Twin Peaks', 'created_at' => now(), 'updated_at' => now()],

            // Tublay id = 13
            ['municipality_id' => 13, 'barangay_name' => 'Ambassador', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 13, 'barangay_name' => 'Ambongdolan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 13, 'barangay_name' => 'Ba-ayan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 13, 'barangay_name' => 'Basil', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 13, 'barangay_name' => 'Caponga (Poblacion)', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 13, 'barangay_name' => 'Daclan', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 13, 'barangay_name' => 'Tublay Central', 'created_at' => now(), 'updated_at' => now()],
            ['municipality_id' => 13, 'barangay_name' => 'Tuel', 'created_at' => now(), 'updated_at' => now()],

        ]);
    }
}
