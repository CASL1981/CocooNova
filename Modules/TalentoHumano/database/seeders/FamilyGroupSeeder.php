<?php

namespace Modules\TalentoHumano\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\TalentoHumano\App\Models\FamilyGroup as ModelsFamilyGroup;

class FamilyGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsFamilyGroup::factory()->count(10)->create();
    }
}
