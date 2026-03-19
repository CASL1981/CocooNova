<?php

namespace Modules\TalentoHumano\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\TalentoHumano\App\Models\DemographicData;
use Modules\TalentoHumano\App\Models\Employee;

class DemographicDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = DemographicData::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'employee_id' => Employee::factory(),
            'politically_exposed' => $this->faker->boolean(),
            'public_resources' => $this->faker->boolean(),
            'special_protection' => $this->faker->boolean(),
            'elderly_person' => $this->faker->boolean(),
            'disabled_person' => $this->faker->boolean(),
            'victims_conflict' => $this->faker->boolean(),
            'extreme_poverty' => $this->faker->boolean(),
            'indigenous_person' => $this->faker->boolean(),
            'afro_population' => $this->faker->boolean(),
            'diverse_population' => $this->faker->boolean(),
            'other_protection' => $this->faker->boolean(),
        ];
    }
}

