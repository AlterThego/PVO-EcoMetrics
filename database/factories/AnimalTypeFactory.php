<?php

namespace Database\Factories;

use App\Models\AnimalType;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnimalType>
 */
class AnimalTypeFactory extends Factory
{
    protected $model = AnimalType::class;

    public function definition(): array
    {
        return [
            'animal_id' => function () {
                return \App\Models\Animal::factory()->create()->id;
            },
            'type' => $this->faker->randomElement(['layers', 'broiler', 'native', 'fighting', null, 'n/a']),
        ];
    }
}
