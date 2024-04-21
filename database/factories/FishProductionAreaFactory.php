<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\FishProductionArea;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FishProductionArea>
 */
class FishProductionAreaFactory extends Factory
{
    protected $model = FishProductionArea::class;

    public function definition(): array
    {
        // Assuming there are existing FishProduction records
        $fishProductionId = \App\Models\FishProduction::inRandomOrder()->first()->id;
        $municipalityId = \App\Models\Municipality::inRandomOrder()->first()->id;
        $barangayId = \App\Models\Barangay::inRandomOrder()->first()->id;

        return [
            'fish_production_id' => $fishProductionId,
            'municipality_id' => $municipalityId,
            'barangay_id' => $barangayId,
            'year' => $this->faker->year,
            'land_area' => $this->faker->randomFloat(2, 1, 100),
            // Add other attributes and their respective values as needed
        ];
    }
}
