<?php

namespace Modules\TalentoHumano\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\TalentoHumano\App\Models\Contract;
use Modules\TalentoHumano\App\Models\SocialSecurity;

class SocialSecuritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crea entre 1 registros de seguridad social por cada contrato activo
        Contract::where('status', true)->each(function (Contract $contract) {
            SocialSecurity::factory()
                ->count(1)
                ->create([
                    'contract_id' => $contract->id,
                    'position' => $contract->position,
                    'work_location' => $contract->destination,
                    'contract_type' => $contract->type,
                    'salary' => $contract->salary,
                    'start_date' => $contract->start_date,
                    'end_date' => $contract->end_date
                ]);
        });
    }
}
