<?php

namespace Modules\TalentoHumano\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\TalentoHumano\App\Models\Contract;
use Modules\TalentoHumano\App\Models\Employee;

class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crea entre 1 registros demográficos por cada empleado existente
        Employee::where('status', true)->each(function (Employee $employee) {
            Contract::factory()
                ->count(1)
                ->create([
                    'employee_id' => $employee->id,
                    'identification' => $employee->identification,
                    'full_name' => $employee->full_name,
                    ]);
        });
    }
}
