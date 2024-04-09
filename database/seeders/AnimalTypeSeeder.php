<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AnimalType;
use Illuminate\Support\Facades\DB;

class AnimalTypeSeeder extends Seeder
{
    public function run()
    {
        // Adjust the number inside the loop based on how many records you want
        // for ($i = 0; $i < 5; $i++) {
        //     AnimalType::factory()->create();
        // }
        // DB::table('animal_type')->insert([
        //     ['type' => 'Layers', 'created_at' => now(), 'updated_at' => now()],
        //     ['type' => 'Broiler', 'created_at' => now(), 'updated_at' => now()],
        //     ['type' => 'Native/Range', 'created_at' => now(), 'updated_at' => now()],
        //     ['type' => 'Fancy/Fighting Fowl', 'created_at' => now(), 'updated_at' => now()],
        //     // ['type' => '', 'created_at' => now(), 'updated_at' => now()],
        // ]);
        
        $animalTypes = [
            'Carabao' => ['Carabull', 'Caracow', 'Caracalf'],
            'Cattle' => ['Bull', 'Cow', 'Calf'],
            'Swine' => ['Boar', 'Sow', 'Finisher', 'Grower', 'Weanling', 'Piglets'],
            'Goat' => ['Buck', 'Doe', 'Buckling', 'Doeling', 'Kid'],
            'Sheep' => ['Ram', 'Ewe', 'Lamb'],
            'Horse' => ['Stallion', 'Colt', 'Mare', 'Filly', 'Foal'],
            'Duck' => ['Drake', 'Duck', 'Duckling'],
            'Chicken' => ['Rooster', 'Hen', 'Pullet', 'Chicks'],
            'Fish' => ['Male Breeder', 'Female Breeder', 'Fingerling'],
            'Dog' => ['Dog/Stud', 'Bitch', 'Puppy'],
            'Cat' => ['Tom', 'Queen', 'Kitten'],
        ];

        // Insert data into the animal_type table based on the animal types defined above
        foreach ($animalTypes as $animal => $types) {
            $animalId = DB::table('animal')->where('animal_name', $animal)->value('id');

            foreach ($types as $type) {
                DB::table('animal_type')->insert([
                    'animal_id' => $animalId,
                    'type' => $type,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}