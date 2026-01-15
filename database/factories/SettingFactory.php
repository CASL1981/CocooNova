<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'modelo' => $this->faker->word(),
            'feature' => $this->faker->word(),
            'value' => $this->faker->numberBetween(1, 100),
            'min' => $this->faker->numberBetween(0, 50),
            'max' => $this->faker->numberBetween(51, 100),
            'status' => $this->faker->boolean(),
        ];
    }
}
