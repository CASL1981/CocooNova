<?php

namespace Modules\TalentoHumano\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FamilyGroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\TalentoHumano\Models\FamilyGroup::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'employee_id' => 1,
            'employee_fullName' => $this->faker->name(),
            'name' => $this->faker->name(),
            'kinship' => $this->faker->randomElement(['Padre', 'Madre', 'Hermano', 'Hermana', 'Hijo', 'Hija', 'Cónyuge']),
            'profession' => $this->faker->jobTitle(),
            'occupation' => $this->faker->jobTitle(),
            'company' => $this->faker->company(),
            'education_level' => $this->faker->randomElement(['Primaria', 'Secundaria', 'Preparatoria', 'Licenciatura', 'Maestría', 'Doctorado']),
            'birth_date' => $this->faker->date(),
            'illness' => $this->faker->optional()->sentence(),
            'phone' => $this->faker->optional()->phoneNumber(),
        ];
    }
}

