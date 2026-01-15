<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destination>
 */
class DestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'costcenter' => $this->faker->randomElement(['1000', '1100', '1300', '1600', '2200']),
            'name' => $this->faker->randomElement(['Farmacia Pueblo Nuevo', 'Farmacia Valencia', 'Farmacia San Antero', 'Farmacia Montelibano' , 'Farmacia San Carlos']),
            'address' => 'Interno de la ESE',
            'phone' => '6052222222',
            'location' => $this->faker->randomElement(['1000', '1100', '1300', '1600', '2200']),
            'minimun' => $this->faker->numberBetween(1, 10),
            'maximun' => $this->faker->numberBetween(1, 10),
        ];
    }
}
