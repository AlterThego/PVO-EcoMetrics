<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AffectedAnimals;


class AffectedAnimalsSeeder extends Seeder
{
    public function run()
    {
        // Adjust the number inside the loop based on how many records you want
        for ($i = 0; $i < 10; $i++) {
            AffectedAnimals::factory()->create();
        }
    }
}