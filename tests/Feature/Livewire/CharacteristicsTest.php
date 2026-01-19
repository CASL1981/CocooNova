<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Characteristics;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class CharacteristicsTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_a_characteristic()
    {
        // Crear usuario y asignar permiso 'characteristic create'
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'characteristic create']);
        $user->givePermissionTo('characteristic create');

        Livewire::actingAs($user);

        Livewire::test(Characteristics::class)
            ->set('name', 'Color')
            ->set('FieldName', 'color_field')
            ->set('Modelo', 'Product')
            ->call('store');

        $this->assertDatabaseHas('characteristics', [
            'name' => 'Color',
            'FieldName' => 'color_field',
            'Modelo' => 'Product',
        ]);
    }

    #[Test]
    public function it_can_list_characteristics()
    {
        // Crear usuario y asignar permiso 'characteristic create' o similar para listar
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'characteristic create']);
        $user->givePermissionTo('characteristic create');

        Livewire::actingAs($user);

        \App\Models\Characteristic::factory()->create(['name' => 'Size', 'FieldName' => 'size_field', 'Modelo' => 'Product']);
        \App\Models\Characteristic::factory()->create(['name' => 'Weight', 'FieldName' => 'weight_field', 'Modelo' => 'Product']);

        Livewire::test(Characteristics::class)
            ->assertSee('Size')
            ->assertSee('Weight');
    }

    #[Test]
    public function it_can_update_a_characteristic()
    {
        // Crear usuario y asignar permiso 'characteristic update'
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'characteristic update']);
        $user->givePermissionTo('characteristic update');

        Livewire::actingAs($user);

        $characteristic = \App\Models\Characteristic::factory()->create();

        Livewire::test(Characteristics::class)
            ->set('selected_id', $characteristic->id)
            ->call('edit')
            ->set('name', 'Updated Characteristic')
            ->set('FieldName', 'updated_field')
            ->set('Modelo', 'UpdatedModel')
            ->call('update');

        $this->assertDatabaseHas('characteristics', [
            'id' => $characteristic->id,
            'name' => 'Updated Characteristic',
            'FieldName' => 'updated_field',
            'Modelo' => 'UpdatedModel',
        ]);
    }

    #[Test]
    public function it_can_duplicate_a_characteristic()
    {
        // Crear usuario y asignar permiso 'characteristic create'
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'characteristic create']);
        $user->givePermissionTo('characteristic create');

        Livewire::actingAs($user);

        $characteristic = \App\Models\Characteristic::factory()->create(['name' => 'Original Characteristic']);

        Livewire::test(Characteristics::class)
            ->set('selected_id', $characteristic->id)
            ->call('duplicate');

        $this->assertDatabaseHas('characteristics', [
            'name' => 'Original Characteristic (Copia)',
            'FieldName' => $characteristic->FieldName,
            'Modelo' => $characteristic->Modelo,
        ]);

        $this->assertDatabaseCount('characteristics', 2); // Original + copia
    }

    #[Test]
    public function it_validates_required_fields()
    {
        // Crear usuario y asignar permiso 'characteristic create'
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'characteristic create']);
        $user->givePermissionTo('characteristic create');

        Livewire::actingAs($user);

        Livewire::test(Characteristics::class)
            ->set('name', '')
            ->set('FieldName', '')
            ->set('Modelo', '')
            ->call('store')
            ->assertHasErrors(['name' => 'required', 'FieldName' => 'required', 'Modelo' => 'required']);
    }

    #[Test]
    public function it_validates_name_min_length()
    {
        // Crear usuario y asignar permiso 'characteristic create'
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'characteristic create']);
        $user->givePermissionTo('characteristic create');

        Livewire::actingAs($user);

        Livewire::test(Characteristics::class)
            ->set('name', 'AB') // Menos de 3 caracteres
            ->set('FieldName', 'field')
            ->set('Modelo', 'Model')
            ->call('store')
            ->assertHasErrors(['name' => 'min']);
    }

    #[Test]
    public function it_validates_name_max_length()
    {
        // Crear usuario y asignar permiso 'characteristic create'
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'characteristic create']);
        $user->givePermissionTo('characteristic create');

        Livewire::actingAs($user);

        Livewire::test(Characteristics::class)
            ->set('name', str_repeat('A', 101)) // Más de 100 caracteres
            ->set('FieldName', 'field')
            ->set('Modelo', 'Model')
            ->call('store')
            ->assertHasErrors(['name' => 'max']);
    }
}