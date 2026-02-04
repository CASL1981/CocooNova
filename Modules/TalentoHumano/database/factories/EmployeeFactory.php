<?php

namespace Modules\TalentoHumano\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\TalentoHumano\App\Models\Employee;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'identification' => $this->faker->unique()->numerify('##########'),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'type_document' => $this->faker->randomElement(['CC', 'CE', 'TI', 'PAS']),
            'address' => $this->faker->address,
            'cel_phone2' => $this->faker->phoneNumber,
            'cel_phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'gender' => $this->faker->randomElement(['M', 'F', 'O']),
            'birth_date' => $this->faker->date('Y-m-d', '-18 years'),
            'destination_id' => 1, // Assuming a destination with ID 1 exists
            'expedition_department' => 'CORDOBA',
            'expedition_city' => 'MONTERIA',
            'military_service' => '1234657',
            'type_militart' => 'Priemra Clase',
            'district' => 'MONTERIA',
            'department' => 'CORDOBA',
            'city' => 'MONTERIA',
            'estrato' => 2,
            'type_housing' => 'Propia',
            'number_children' => 1,
            'department_birth' => 'CORDOBA',
            'city_birth' => 'MONTERIA',
            'blood_type' => 'O+',
            'marital_status' => 'Soltero',
            'position' => 'Desarrollador',
            'area' => 'Tecnologia',
            'photo_path' => null,
            'vendedor' => $this->faker->boolean,
            'status' => $this->faker->boolean(80), // 80% chance of true
            'auditor' => $this->faker->boolean,
            'approve' => $this->faker->boolean,
            'created_by' => \App\Models\User::factory(),
            'updated_by' => \App\Models\User::factory(),
        ];
    }
}
