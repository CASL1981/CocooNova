<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CharacteristicDetail>
 */
class CharacteristicDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'characteristic_id' => \App\Models\Characteristic::factory(),
            'name' => $this->faker->word(),
            'abbreviation' => $this->faker->optional()->word(),
            'code' => $this->faker->optional()->word(),
            'value' => $this->faker->optional()->randomFloat(2, 0, 1000),
            'percentage' => $this->faker->optional()->randomFloat(2, 0, 100),
            'max' => $this->faker->optional()->numberBetween(0, 100),
            'min' => $this->faker->optional()->numberBetween(0, 100),
            'stock' => $this->faker->optional()->numberBetween(0, 100),
            'status' => $this->faker->boolean(),
        ];
    }
}
