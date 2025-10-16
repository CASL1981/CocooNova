<?php
namespace Tests\Feature\Livewire;

use App\Livewire\Roles;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RolesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_role()
    {
        // Crear usuario y asignar permiso 'role create'
        $user = \App\Models\User::factory()->create();
        \Spatie\Permission\Models\Permission::firstOrCreate(['name' => 'role create']);
        $user->givePermissionTo('role create');

        Livewire::actingAs($user);

        Livewire::test(Roles::class)
            ->set('name', 'Administrador')
            ->call('store');

        $this->assertDatabaseHas('roles', [
            'name' => 'Administrador',
        ]);
    }

    /** @test */
    public function it_can_list_roles()
    {
        // Role::factory()->count(3)->create();
        $role1 = Role::create(['name' => 'Admin', 'guard_name' => 'web']);
        $role2 = Role::create(['name' => 'Provider', 'guard_name' => 'web']);
        $role3 = Role::create(['name' => 'Customer', 'guard_name' => 'web']);

        Livewire::test(Roles::class)
            ->assertSee(Role::first()->name)
            ->assertSee(Role::first()->description);
    }

    /** @test */
    public function it_can_update_a_role()
    {
        $role = Role::create(['name' => 'User', 'guard_name' => 'web']);

        // Crear usuario y asignar permiso 'role edit'
        $user = \App\Models\User::factory()->create();
        \Spatie\Permission\Models\Permission::firstOrCreate(['name' => 'role update']);
        $user->givePermissionTo('role update');

        Livewire::actingAs($user);

        Livewire::test(Roles::class)
            ->set('selected_id', $role->id)
            ->call('edit')
            ->set('name', 'Editor')
            ->call('update');

        $this->assertDatabaseHas('roles', [
            'id' => $role->id,
            'name' => 'Editor',
        ]);
    }

    /** @test */
    public function it_can_delete_a_role()
    {
        $role = Role::create(['name' => 'User', 'guard_name' => 'web']);

        // Crear usuario y asignar permiso 'role delete'
        $user = \App\Models\User::factory()->create();
        \Spatie\Permission\Models\Permission::create(['name' => 'role delete']);
        $user->givePermissionTo('role delete');

        Livewire::actingAs($user);

        Livewire::test(Roles::class)
            ->set('selected_id', $role->id)
            ->call('delete');

        $this->assertDatabaseMissing('roles', [
            'id' => $role->id,
        ]);
    }

    /** @test */
    public function it_validates_required_fields()
    {
        // Crear usuario y asignar permiso 'role create'
        $user = \App\Models\User::factory()->create();
        \Spatie\Permission\Models\Permission::firstOrCreate(['name' => 'role create']);
        $user->givePermissionTo('role create');

        Livewire::actingAs($user);

        Livewire::test(Roles::class)
            ->set('name', '')
            ->call('store')
            ->assertHasErrors(['name' => 'required']);
    }

    /** @test */
    public function it_validates_unique_name()
    {
        Role::create(['name' => 'Unico']);

        // Crear usuario y asignar permiso 'role create'
        $user = \App\Models\User::factory()->create();
        \Spatie\Permission\Models\Permission::firstOrCreate(['name' => 'role create']);
        $user->givePermissionTo('role create');

        Livewire::actingAs($user);

        Livewire::test(Roles::class)
            ->set('name', 'Unico')
            ->call('store')
            ->assertHasErrors(['name' => 'unique']);
    }
}