<?php

namespace Modules\TalentoHumano\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\TalentoHumano\App\Enums\ContractType;
use Modules\TalentoHumano\App\Models\Contract;
use Modules\TalentoHumano\App\Models\SocialSecurity;

class SocialSecurityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = SocialSecurity::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'contract_id' => Contract::factory(),
            'position' => $this->faker->jobTitle(),
            'work_location' => $this->faker->city(),
            'contract_type' => $this->faker->randomElement(ContractType::cases())->value,
            'salary' => $this->faker->randomFloat(2, 1000, 5000),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'status' => $this->faker->boolean(),
            'eps' => $this->faker->sentence(5),
            'afp' => $this->faker->sentence(5),
            'risk' => $this->faker->randomElement(['Low', 'Medium', 'High']),
            'work_shift' => $this->faker->randomElement(['Day', 'Night'])
        ];
    }
}

