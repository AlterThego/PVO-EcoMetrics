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

        return [
            'fish_production_id' => $fishProductionId,
            'year' => $this->faker->year,
            'land_area' => $this->faker->randomFloat(2, 1, 100),
            // Add other attributes and their respective values as needed
        ];
    }
}
