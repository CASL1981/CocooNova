<?php

namespace Modules\TalentoHumano\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\TalentoHumano\App\Models\DemographicData;
use Modules\TalentoHumano\App\Models\Employee;

class DemographicDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crea entre 1 y 3 registros demográficos por cada empleado existente
        Employee::all()->each(function (Employee $employee) {
            DemographicData::factory()
                ->count(1)
                ->create(['employee_id' => $employee->id]);
        });
    }
}
