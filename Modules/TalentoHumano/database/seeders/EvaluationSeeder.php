<?php

namespace Modules\TalentoHumano\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\TalentoHumano\App\Models\Employee;
use Modules\TalentoHumano\App\Models\Evaluation;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::all()->each(function (Employee $employee) {

            // 1 evaluación Anual
            Evaluation::factory()->create([
                'type' => 'Anual',
                'employee_id' => $employee->id]
                );

            // 2 evaluaciones Periódicas
            Evaluation::factory()
                ->count(2)->create([
                    'type' => 'Periodica',
                    'employee_id' => $employee->id
                    ]);

            // 1 evaluación de Proceso
            Evaluation::factory()->create([
                    'type' => 'Proceso',
                    'employee_id' => $employee->id
                ]);
        });
    }
}
