<?php

namespace Modules\TalentoHumano\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\TalentoHumano\App\Models\Employee;
use Modules\TalentoHumano\App\Models\Evaluation;

class EvaluationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Evaluation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $types = [
            'Anual',
            'Periodica',
            'Proceso',
        ];

        $interpretations = [
            'Critica',
            'Aceptable',
            'Satisfactorio',
        ];

        $startDate = $this->faker->dateTimeBetween('-2 años', '-1 mes');
        $endDate   = $this->faker->dateTimeBetween($startDate, 'now');

        return [
            'employee_id'    => Employee::factory(),
            'type'           => $this->faker->randomElement($types),
            'start_date'     => $startDate,
            'end_date'       => $endDate,
            'date'           => $this->faker->dateTimeBetween($startDate, $endDate),
            'result'         => $this->faker->randomFloat(1, 1, 5), // Resultado entre 1.0 y 5.0 con un decimal
            'interpretation' => $this->faker->randomElement($interpretations),
        ];
    }
}

