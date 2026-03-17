<?php

namespace Modules\TalentoHumano\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\TalentoHumano\App\Models\AcademicInfo;
use Modules\TalentoHumano\App\Models\Employee;

class AcademicInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = AcademicInfo::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $modalities = [
            'Presencial',
            'Virtual',
            'Semipresencial',
            'A distancia',
        ];

        $degrees = [
            'Tecnólogo',
            'Profesional',
            'Especialización',
            'Maestría',
            'Doctorado',
            'Bachiller',
            'Técnico',
        ];

        $institutions = [
            'Universidad Nacional de Colombia',
            'Universidad de los Andes',
            'Universidad EAFIT',
            'Universidad del Rosario',
            'SENA',
            'Universidad Externado de Colombia',
            'Pontificia Universidad Javeriana',
        ];

        return [
            'employee_id'             => Employee::factory(),
            'academic_modality'       => $this->faker->randomElement($modalities),
            'graduate'                => $this->faker->boolean(70),
            'degree_obtained'         => $this->faker->randomElement($degrees),
            'educational_institution' => $this->faker->randomElement($institutions),
            'duration'                => $this->faker->numerify('# semestres'),
            'completion_date'         => $this->faker->optional()->dateTimeBetween('-20 años', 'now'),
            'professional_license'    => $this->faker->optional()->numerify('##########'),
        ];
    }
}

