<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Users;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_user()
    {
    $user = User::factory()->create();
    $role = \Spatie\Permission\Models\Role::create(['name' => 'test-role-create']);
    $permission = \Spatie\Permission\Models\Permission::create(['name' => 'user create']);
    $role->givePermissionTo($permission);
    $user->assignRole($role);
    Livewire::actingAs($user);
        $component = Livewire::test(Users::class)
            ->set('form.name', 'Juan')
            ->set('form.lastname', 'Pérez')
            ->set('form.email', 'juan@example.com')
            ->set('form.identification', '12345678')
            ->set('form.area', 'Administrativa')
            ->set('form.status', 'active')
            ->set('form.role_id', 1)
            ->call('store');

        $this->assertDatabaseHas('users', [
            'name' => 'Juan',
            'lastname' => 'Pérez',
            'email' => 'juan@example.com',
            'identification' => '12345678',
        ]);
        $component->assertHasNoErrors();
    }

    /** @test */
    public function it_validates_required_fields_on_create()
    {
    $user = User::factory()->create();
    $role = \Spatie\Permission\Models\Role::create(['name' => 'test-role-create']);
    $permission = \Spatie\Permission\Models\Permission::create(['name' => 'user create']);
    $role->givePermissionTo($permission);
    $user->assignRole($role);
    Livewire::actingAs($user);
        $component = Livewire::test(Users::class)
            ->set('form.name', '')
            ->set('form.lastname', '')
            ->set('form.email', '')
            ->set('form.identification', '')
            ->call('store');

        $component->assertHasErrors(['form.name', 'form.lastname', 'form.email', 'form.identification']);
    }

    /** @test */
    public function it_prevents_duplicate_email_and_identification()
    {
        User::factory()->create([
            'email' => 'juan@example.com',
            'identification' => '12345678',
            'password' => bcrypt('password123'),
        ]);
    $user = User::factory()->create();
    $role = \Spatie\Permission\Models\Role::create(['name' => 'test-role-create']);
    $permission = \Spatie\Permission\Models\Permission::create(['name' => 'user create']);
    $role->givePermissionTo($permission);
    $user->assignRole($role);
    Livewire::actingAs($user);
        $component = Livewire::test(Users::class)
            ->set('form.name', 'Juan')
            ->set('form.lastname', 'Pérez')
            ->set('form.email', 'juan@example.com')
            ->set('form.identification', '12345678')
            ->call('store');

        $component->assertHasErrors(['form.email', 'form.identification']);
    }

    /** @test */
    public function it_can_list_users()
    {
    $user = User::factory()->create();
    $role = \Spatie\Permission\Models\Role::create(['name' => 'test-role-read']);
    $permission = \Spatie\Permission\Models\Permission::create(['name' => 'user read']);
    $role->givePermissionTo($permission);
    $user->assignRole($role);
    Livewire::actingAs($user);
        User::factory()->count(3)->create();
        $component = Livewire::test(Users::class);
        $this->assertCount(4, $component->viewData('users'));
    }

    /** @test */
    public function it_can_update_a_user()
    {
        $user = User::factory()->create([
            'identification' => '12345678',
            'name' => 'Juan',
            'lastname' => 'Pérez',
            'area' => 'Comercial',
            'email' => 'juan@example.com',
            'status' => 0,
            'role_id' => 1,
            'destination' => 1,
        ]);
    $admin = User::factory()->create();
    $role = \Spatie\Permission\Models\Role::create(['name' => 'test-role-update']);
    $permission = \Spatie\Permission\Models\Permission::create(['name' => 'user update']);
    $role->givePermissionTo($permission);
    $admin->assignRole($role);
    // Creamos un segundo rol para la actualización
    $role2 = \Spatie\Permission\Models\Role::create(['name' => 'otro-rol']);
    Livewire::actingAs($admin);
        $component = Livewire::test(Users::class)
            ->set('selected_id', $user->id)
            ->set('form.selected_id', $user->id)
            ->set('form.identification', '87654321')
            ->set('form.name', 'Carlos')
            ->set('form.lastname', 'Gómez')
            ->set('form.area', 'Administrativa')
            ->set('form.email', 'carlos@example.com')
            ->set('form.status', 1)
            ->set('form.role_id', $role2->id)
            ->set('form.destination', 1000)
            ->call('update');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'identification' => '87654321',
            'name' => 'Carlos',
            'lastname' => 'Gómez',
            'area' => 'Administrativa',
            'email' => 'carlos@example.com',
            'status' => 1,
            'role_id' => 2,
            'destination' => 1000,
        ]);
        
        $component->assertHasNoErrors();
    }

    /** @test */
    public function it_validates_required_fields_on_update()
    {
        $user = User::factory()->create();
    $admin = User::factory()->create();
    $role = \Spatie\Permission\Models\Role::create(['name' => 'test-role-update']);
    $permission = \Spatie\Permission\Models\Permission::create(['name' => 'user update']);
    $role->givePermissionTo($permission);
    $admin->assignRole($role);
    Livewire::actingAs($admin);
        $component = Livewire::test(Users::class)
            ->set('form.selected_id', $user->id)
            ->set('form.name', '')
            ->set('form.lastname', '')
            ->set('form.email', '')
            ->set('form.identification', '')
            ->call('update');

        $component->assertHasErrors(['form.name', 'form.lastname', 'form.email', 'form.identification']);
    }

    /** @test */
    public function it_can_delete_a_user()
    {
        $user = User::factory()->create();
    $admin = User::factory()->create();
    $role = \Spatie\Permission\Models\Role::create(['name' => 'test-role-delete']);
    $permission = \Spatie\Permission\Models\Permission::create(['name' => 'user delete']);
    $role->givePermissionTo($permission);
    $admin->assignRole($role);
    Livewire::actingAs($admin);
        $component = Livewire::test(Users::class)
            ->set('selected_id', $user->id)
            ->call('delete');

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }

    /** @test */
    public function it_handles_delete_of_nonexistent_user_gracefully()
    {
    $admin = User::factory()->create();
    $role = \Spatie\Permission\Models\Role::create(['name' => 'test-role-delete']);
    $permission = \Spatie\Permission\Models\Permission::create(['name' => 'user delete']);
    $role->givePermissionTo($permission);
    $admin->assignRole($role);
    Livewire::actingAs($admin);
        $component = Livewire::test(Users::class)
            ->set('form.selected_id', 9999)
            ->call('delete');

        $component->assertHasNoErrors();
    }

    /** @test */
    public function it_validates_identification_length_and_digits()
    {
        $base = [
            'name' => 'Test',
            'lastname' => 'User',
            'email' => 'test1@example.com',
            'area' => 'Administrativa',
            'status' => 'active',
            'role_id' => 1,
            'destination' => 1,
        ];
        $user = User::factory()->create();
        $role = \Spatie\Permission\Models\Role::create(['name' => 'test-role-create']);
        $permission = \Spatie\Permission\Models\Permission::create(['name' => 'user create']);
        $role->givePermissionTo($permission);
        $user->assignRole($role);
        Livewire::actingAs($user);

        Livewire::test(Users::class)
            ->set('form.identification', '123') // menos de 7 dígitos
            ->set('form.name', $base['name'])
            ->set('form.lastname', $base['lastname'])
            ->set('form.email', $base['email'])
            ->set('form.area', $base['area'])
            ->set('form.status', $base['status'])
            ->set('form.role_id', $base['role_id'])
            ->set('form.destination', $base['destination'])
            ->call('store')
            ->assertHasErrors(['form.identification']);

        Livewire::test(Users::class)
            ->set('form.identification', '1234567890123') // más de 12 dígitos
            ->set('form.name', $base['name'])
            ->set('form.lastname', $base['lastname'])
            ->set('form.email', 'test2@example.com')
            ->set('form.area', $base['area'])
            ->set('form.status', $base['status'])
            ->set('form.role_id', $base['role_id'])
            ->set('form.destination', $base['destination'])
            ->call('store')
            ->assertHasErrors(['form.identification']);

        Livewire::test(Users::class)
            ->set('form.identification', 'abc123456') // caracteres no numéricos
            ->set('form.name', $base['name'])
            ->set('form.lastname', $base['lastname'])
            ->set('form.email', 'test3@example.com')
            ->set('form.area', $base['area'])
            ->set('form.status', $base['status'])
            ->set('form.role_id', $base['role_id'])
            ->set('form.destination', $base['destination'])
            ->call('store')
            ->assertHasErrors(['form.identification']);
    }

    /** @test */
    public function it_validates_email_format()
    {
        $base = [
            'identification' => '12345678',
            'name' => 'Test',
            'lastname' => 'User',
            'area' => 'Administrativa',
            'status' => 'active',
            'role_id' => 1,
            'destination' => 1,
        ];
        $user = User::factory()->create();
        $role = \Spatie\Permission\Models\Role::create(['name' => 'test-role-create']);
        $permission = \Spatie\Permission\Models\Permission::create(['name' => 'user create']);
        $role->givePermissionTo($permission);
        $user->assignRole($role);
        Livewire::actingAs($user);
        Livewire::test(Users::class)
            ->set('form.identification', $base['identification'])
            ->set('form.name', $base['name'])
            ->set('form.lastname', $base['lastname'])
            ->set('form.email', 'not-an-email')
            ->set('form.area', $base['area'])
            ->set('form.status', $base['status'])
            ->set('form.role_id', $base['role_id'])
            ->set('form.destination', $base['destination'])
            ->call('store')
            ->assertHasErrors(['form.email']);
    }

    /** @test */
    public function it_validates_area_value()
    {
        $base = [
            'identification' => '12345678',
            'name' => 'Test',
            'lastname' => 'User',
            'email' => 'test@example.com',
            'status' => 'active',
            'role_id' => 1,
            'destination' => 1,
        ];
        $user = User::factory()->create();
        $role = \Spatie\Permission\Models\Role::create(['name' => 'test-role-create']);
        $permission = \Spatie\Permission\Models\Permission::create(['name' => 'user create']);
        $role->givePermissionTo($permission);
        $user->assignRole($role);
        Livewire::actingAs($user);
        Livewire::test(Users::class)
            ->set('form.identification', $base['identification'])
            ->set('form.name', $base['name'])
            ->set('form.lastname', $base['lastname'])
            ->set('form.email', $base['email'])
            ->set('form.area', 'NoValida')
            ->set('form.status', $base['status'])
            ->set('form.role_id', $base['role_id'])
            ->set('form.destination', $base['destination'])
            ->call('store')
            ->assertHasErrors(['form.area']);
    }

    /** @test */
    // El campo status es nullable, así que no requiere validación estricta de valor
}
