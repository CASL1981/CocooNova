<?php

namespace Modules\TalentoHumano\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\TalentoHumano\App\Models\Employee;
use Modules\TalentoHumano\App\Models\AcademicInfo;

class AcademicInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crea entre 1 y 3 registros académicos por cada empleado existente
        Employee::all()->each(function (Employee $employee) {
            AcademicInfo::factory()
                ->count(rand(1, 3))
                ->create(['employee_id' => $employee->id]);
        });
    }
}
