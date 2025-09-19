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
        Livewire::test(Roles::class)
            ->set('name', 'Administrador')
            ->set('description', 'Acceso total')
            ->call('save');

        $this->assertDatabaseHas('roles', [
            'name' => 'Administrador',
            'description' => 'Acceso total',
        ]);
    }

    /** @test */
    public function it_can_list_roles()
    {
        Role::factory()->count(3)->create();

        Livewire::test(Roles::class)
            ->assertSee(Role::first()->name)
            ->assertSee(Role::first()->description);
    }

    /** @test */
    public function it_can_update_a_role()
    {
        $role = Role::factory()->create(['name' => 'User', 'description' => 'Basic']);

        Livewire::test(Roles::class)
            ->call('edit', $role->id)
            ->set('name', 'Editor')
            ->set('description', 'Edita contenidos')
            ->call('save');

        $this->assertDatabaseHas('roles', [
            'id' => $role->id,
            'name' => 'Editor',
            'description' => 'Edita contenidos',
        ]);
    }

    /** @test */
    public function it_can_delete_a_role()
    {
        $role = Role::factory()->create();

        Livewire::test(Roles::class)
            ->call('delete', $role->id);

        $this->assertDatabaseMissing('roles', [
            'id' => $role->id,
        ]);
    }

    /** @test */
    public function it_validates_required_fields()
    {
        Livewire::test(Roles::class)
            ->set('name', '')
            ->call('save')
            ->assertHasErrors(['name' => 'required']);
    }

    /** @test */
    public function it_validates_unique_name()
    {
        Role::factory()->create(['name' => 'Unico']);

        Livewire::test(Roles::class)
            ->set('name', 'Unico')
            ->call('save')
            ->assertHasErrors(['name' => 'unique']);
    }
}