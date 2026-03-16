<?php

namespace Modules\TalentoHumano\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\TalentoHumano\App\Models\Employee;
use Modules\TalentoHumano\App\Models\WorkExperience;

class WorkExperienceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = WorkExperience::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $contractTypes = ['Termino Fijo', 'Indefinido', 'Prestación de servicio', 'Contrato de aprendizaje', 'Temporal'];
        $natures       = ['Privada', 'Publica', 'Mixta'];

        $startDate = $this->faker->dateTimeBetween('-15 years', '-1 year');

        $endDate   = $this->faker->optional()->dateTimeBetween($startDate, 'now');

        return [
            'employee_id'          => Employee::factory(),
            'company'              => $this->faker->company(),
            'nature'               => $this->faker->randomElement($natures),
            'position'             => $this->faker->jobTitle(),
            'immediate_supervisor' => $this->faker->name(),
            'start_date'           => $startDate,
            'end_date'             => $endDate,
            'time_service'         => $this->faker->numerify('# years # months'),
            'city'                 => $this->faker->city(),
            'phone'                => '3013013010',
            'contract_type'        => $this->faker->randomElement($contractTypes),
            'salary'               => $this->faker->randomFloat(2, 1_000_000, 15_000_000),
            'main_duties'          => $this->faker->paragraph(3),
            'reason_for_leaving'   => $this->faker->sentence(),
        ];
    }
}

