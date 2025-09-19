<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $administrador = User::factory()->create([
            "identification"=> 7383633,
            "name"=> "Carlos",
            "lastname"=> "Sibaja",
            'email' => 'contabilidad@coodescor.org.co',
            'status' => true,
            'role_id' => 1,
        ]);

        User::factory()->create([
            "identification"=> 1143365495,
            "name"=> "Ariana",
            "lastname"=> "Cantero Muñoz",
            'email' => 'thcalidad@coodescor.org.co',
            'status' => true,
            'role_id' => 1,
        ]);

        User::factory()->create([
            "identification"=> 1067912234,
            "name"=> "Estefania",
            "lastname"=> "Bolaño Perez",
            'email' => 'auditoria@coodescor.org.co',
            'status' => true,
            'role_id' => 1,
        ]);

        User::factory()->create([
            "identification"=> 50986771,
            "name"=> "Kelly",
            "lastname"=> "Petro Hernandez",
            'email' => 'tesoreria@coodescor.org.co',
            'status' => true,
            'role_id' => 1,
        ]);

        User::factory()->create([
            "identification"=> 1067891523,
            "name"=> "Tania",
            "lastname"=> "Martínez Hernandez",
            'email' => 'contratacion@coodescor.org.co',
            'status' => true,
            'role_id' => 1,
        ]);

        User::factory()->create([
            "identification"=> 10767468,
            "name"=> "Carlos",
            "lastname"=> "Martínez Almanza",
            'email' => 'auxiliardearchivo@coodescor.org.co',
            'status' => true,
            'role_id' => 1,
        ]);

        User::factory()->create([
            "identification"=> 1067908130,
            "name"=> "Katerin",
            "lastname"=> "Pertuz Jimenez",
            'email' => 'contabilidad1@coodescor.org.co',
            'status' => true,
            'role_id' => 1,
        ]);

        User::factory()->create([
            "identification"=> 1066750361,
            "name"=> "Danilo",
            "lastname"=> "Gómez Calle",
            'email' => 'auxiliarcedis@gmail.com',
            'status' => true,
            'role_id' => 1,
        ]);

        User::factory()->create([
            "identification"=> 1067952779,
            "name"=> "Alexandra",
            "lastname"=> "Begambre Pereira",
            'email' => 'asistentedegerencia@coodescor.org.co',
            'status' => true,
            'role_id' => 1,
        ]);

        User::factory()->create([
            "identification"=> 1064976044,
            "name"=> "Yuliana",
            "lastname"=> "Arcia Rodríguez",
            'email' => 'auxiliarsst.coodescor@gmail.com',
            'status' => true,
            'role_id' => 1,
        ]);

        User::factory()->create([
            "identification"=> 1003399900            ,
            "name"=> "Carlos",
            "lastname"=> "Nuñez Narvaez",
            'email' => 'calidadcoodescor@gmail.com',
            'status' => true,
            'role_id' => 1,
        ]);

        $admin = Role::create(['name' => 'administrador']);
        Role::create(['name' => 'Auxiliar Contable']);
        Role::create(['name' => 'Coordinador TH']);
        Role::create(['name' => 'Tesoreria']);

        // permissions from the CRUD

        $permissions = [
            'create',
            'read',
            'update',
            'delete',
            'toggle'
        ];

        $modules = [
            'destination',
            'classification',
            'user',
            'role',
        ];

        foreach($modules as $rol){
            foreach($permissions as $per){
                Permission::create([
                    'name' => "{$rol} $per",
                    'modelo' => "{$rol}"
                ]);
            }
        }

        // assign the permissions to the role
        $admin->syncPermissions(Permission::all());


        // assign the role to the user
        $administrador->assignRole('administrador');
    }
}
