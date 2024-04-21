<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\VeterinaryClinics;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VeterinaryClinics>
 */
class VeterinaryClinicsFactory extends Factory
{
    protected $model = VeterinaryClinics::class;

    public function definition(): array
    {
        // Assuming there are existing Municipality records
        $municipalityId = \App\Models\Municipality::inRandomOrder()->first()->id;
        $barangayId = \App\Models\Barangay::inRandomOrder()->first()->id;

        return [
            'municipality_id' => $municipalityId,
            'barangay_id' => $barangayId,
            'sector' => $this->faker->randomElement(['Government', 'Private']),
            'clinic_name' => $this->faker->unique()->company,
            'year_established' => $this->faker->year,
            'year_closed' => $this->faker->optional(0.2)->year, // 20% chance of being nullable
        ];
    }
}
