<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use app\Models\FarmSupply;

class FarmSupplyFactory extends Factory
{
    protected $model = FarmSupply::class;

    public function definition(): array
    {
        // Assuming there are existing Municipality records
        $municipalityId = \App\Models\Municipality::inRandomOrder()->first()->id;
        $barangayId = \App\Models\Barangay::inRandomOrder()->first()->id;
        
        return [
            'municipality_id' => $municipalityId,
            'barangay_id' => $barangayId,
            'establishment_name' =>$this->faker->text(20),
            'year_established' => $this->faker->year,
            'year_closed' => $this->faker->optional(0.2)->year,
        ];
    }
}
