<?php

namespace Modules\TalentoHumano\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\TalentoHumano\App\Models\Employee;
use Modules\TalentoHumano\App\Models\WorkExperience;

class WorkExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::all()->each(function (Employee $employee) {
            WorkExperience::factory()
                ->count(3)
                ->create(['employee_id' => $employee->id]);
        });
    }
}
