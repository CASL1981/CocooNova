<?php

namespace Modules\TalentoHumano\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TalentoHumanoDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            EmployeeSeeder::class,
            FamilyGroupSeeder::class,
            WorkExperienceSeeder::class,
            AcademicInfoSeeder::class,
            EvaluationSeeder::class,
            DemographicDataSeeder::class,
        ]);

        $admin = Role::find(1);

        $talentohumano = Role::find(3);

        //CRUD
        $permissions = [
            'create',
            'read',
            'update',
            'delete',
            'toggle',
            'process',
            'reverse'
        ];

        $modules = [
            'employee',
            'contracts',
            'familygroup',
            'workexperience',
            'academicinfo',
            'evaluation',
            'demographicdata'
        ];

        foreach($modules as $rol){
            foreach($permissions as $per){
                Permission::create([
                    'name' => "{$rol} $per",
                    'modelo' => "{$rol}"
                ]);
            }
        }

        $admin->syncPermissions(Permission::all());

        $talentohumano->syncPermissions(Permission::where('name', 'like', '%talentohumano%')
                                                    ->orWhere('name', 'like', '%contracts%')
                                                    ->orWhere('name', 'like', '%familygroup%')
                                                    ->orWhere('name', 'like', '%workexperience%')
                                                    ->orWhere('name', 'like', '%academicinfo%')
                                                    ->orWhere('name', 'like', '%evaluation%')
                                                    ->orWhere('name', 'like', '%demographicdata%')
                                                    ->get());
    }
}
