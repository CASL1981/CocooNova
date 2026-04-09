<?php

namespace Modules\TalentoHumano\Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\TalentoHumano\App\Enums\ContractType;
use Modules\TalentoHumano\App\Models\Contract;
use Modules\TalentoHumano\App\Models\Employee;

class ContractFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Contract::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(), 
            'employee_id' => Employee::factory(),
            'identification' => $this->faker->unique()->numerify('###########'),
            'full_name' => $this->faker->name(),
            'hiring_date' => $this->faker->date(),
            'termination_date' => $this->faker->date(),
            'format' => $this->faker->randomElement(ContractType::cases())->value,
            'observations' => $this->faker->sentence(),
            'city' => $this->faker->city(),
            'type' => $this->faker->randomElement(ContractType::cases())->value,
            'position' => $this->faker->jobTitle(),
            'probationary_period' => $this->faker->numberBetween(0, 6),
            'salary' => $this->faker->numberBetween(1000, 5000),
            'work_schedule' => $this->faker->randomElement(['Lunes a Viernes', 'Turnos', 'Fines de semana']),
            'reason_leaving' => $this->faker->sentence(),
            'destination' => $this->faker->sentence(),
            'job' => $this->faker->sentence(),
            'status' => $this->faker->boolean(),
            'period' => $this->faker->numberBetween(1, 12),
            'year' => Carbon::now()->year,
        ];
    }
}

