<?php

namespace Tests\Feature;

use App\Livewire\DetailCharacteristics;
use App\Models\Characteristic;
use App\Models\CharacteristicDetail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class DetailCharacteristicsTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_a_characteristic_detail()
    {
        // Crear usuario y asignar permiso 'characteristic create'
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'characteristic create']);
        $user->givePermissionTo('characteristic create');

        $characteristic = Characteristic::factory()->create();

        Livewire::actingAs($user);

        Livewire::test(DetailCharacteristics::class)
            ->call('selectdId', ['id' => $characteristic->id])
            ->set('characteristic_id', $characteristic->id)
            ->set('name', 'Detail Name')
            ->set('abbreviation', 'DN')
            ->set('code', 'DN001')
            ->set('value', 100.50)
            ->set('percentage', 10.5)
            ->set('max', 200.00)
            ->set('min', 50.00)
            ->set('stock', 0)
            ->set('status', true)
            ->call('store');

        $this->assertDatabaseHas('characteristic_details', [
            'characteristic_id' => $characteristic->id,
            'name' => 'Detail Name',
            'abbreviation' => 'DN',
            'code' => 'DN001',
            'value' => 100.50,
            'percentage' => 10.5,
            'max' => 200.00,
            'min' => 50.00,
            'status' => 1,
        ]);
    }

    #[Test]
    public function it_can_list_characteristic_details()
    {
        // Crear usuario y asignar permiso 'characteristic create'
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'characteristic create']);
        $user->givePermissionTo('characteristic create');

        $characteristic = Characteristic::factory()->create();

        Livewire::actingAs($user);

        CharacteristicDetail::factory()->create(['characteristic_id' => $characteristic->id, 'name' => 'Detail 1']);
        CharacteristicDetail::factory()->create(['characteristic_id' => $characteristic->id, 'name' => 'Detail 2']);

        Livewire::test(DetailCharacteristics::class)
            ->call('selectdId', ['id' => $characteristic->id])
            ->assertSee('Detail 1')
            ->assertSee('Detail 2');
    }

    #[Test]
    public function it_can_update_a_characteristic_detail()
    {
        // Crear usuario y asignar permiso 'characteristic update'
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'characteristic update']);
        $user->givePermissionTo('characteristic update');

        Livewire::actingAs($user);

        $detail = CharacteristicDetail::factory()->create();

        Livewire::test(DetailCharacteristics::class)
            ->set('selected_id', $detail->id)
            ->set('characteristic_id', $detail->characteristic_id)
            ->set('name', 'Updated Detail')
            ->set('abbreviation', 'UD')
            ->set('code', 'UD001')
            ->set('value', 150.00)
            ->set('percentage', 15.0)
            ->set('max', 250.00)
            ->set('min', 75.00)
            ->set('stock', 1)
            ->set('status', false)
            ->call('update');

        $this->assertDatabaseHas('characteristic_details', [
            'id' => $detail->id,
            'name' => 'Updated Detail',
            'abbreviation' => 'UD',
        ]);
    }

    #[Test]
    public function it_can_delete_a_characteristic_detail()
    {
        // Crear usuario y asignar permiso 'characteristic delete'
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'characteristic delete']);
        $user->givePermissionTo('characteristic delete');

        Livewire::actingAs($user);

        $detail = CharacteristicDetail::factory()->create();

        Livewire::test(DetailCharacteristics::class)
            ->set('selected_id', $detail->id)
            ->call('delete');

        $this->assertDatabaseMissing('characteristic_details', [
            'id' => $detail->id,
        ]);
    }

    #[Test]
    public function it_can_duplicate_a_characteristic_detail()
    {
        // Crear usuario y asignar permiso 'characteristic create'
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'characteristic create']);
        $user->givePermissionTo('characteristic create');

        Livewire::actingAs($user);

        $detail = CharacteristicDetail::factory()->create(['name' => 'Original Detail']);

        Livewire::test(DetailCharacteristics::class)
            ->set('selected_id', $detail->id)
            ->call('duplicate');

        $this->assertDatabaseHas('characteristic_details', [
            'name' => 'Original Detail (Copia)',
        ]);

        $this->assertDatabaseCount('characteristic_details', 2); // Original + copia
    }

    #[Test]
    public function it_validates_required_fields()
    {
        // Crear usuario y asignar permiso 'characteristic create'
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'characteristic create']);
        $user->givePermissionTo('characteristic create');

        Livewire::actingAs($user);

        Livewire::test(DetailCharacteristics::class)
            ->set('characteristic_id', '')
            ->set('name', '')
            ->call('store')
            ->assertHasErrors(['characteristic_id' => 'required', 'name' => 'required']);
    }

    #[Test]
    public function it_validates_name_min_length()
    {
        // Crear usuario y asignar permiso 'characteristic create'
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'characteristic create']);
        $user->givePermissionTo('characteristic create');

        $characteristic = Characteristic::factory()->create();

        Livewire::actingAs($user);

        Livewire::test(DetailCharacteristics::class)
            ->set('characteristic_id', $characteristic->id)
            ->set('name', 'AB') // Menos de 3 caracteres
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

        $characteristic = Characteristic::factory()->create();

        Livewire::actingAs($user);

        Livewire::test(DetailCharacteristics::class)
            ->set('characteristic_id', $characteristic->id)
            ->set('name', str_repeat('A', 101)) // Más de 100 caracteres
            ->call('store')
            ->assertHasErrors(['name' => 'max']);
    }

    #[Test]
    public function it_displays_no_details_when_no_characteristic_selected()
    {
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'characteristic create']);
        $user->givePermissionTo('characteristic create');

        Livewire::actingAs($user);

        // Crear algunos details
        CharacteristicDetail::factory()->create(['name' => 'Detail 1']);
        CharacteristicDetail::factory()->create(['name' => 'Detail 2']);

        Livewire::test(DetailCharacteristics::class)
            ->assertDontSee('Detail 1')
            ->assertDontSee('Detail 2');
    }

    #[Test]
    public function it_cannot_create_detail_without_selecting_characteristic()
    {
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'characteristic create']);
        $user->givePermissionTo('characteristic create');

        Livewire::actingAs($user);

        Livewire::test(DetailCharacteristics::class)
            ->set('name', 'Test Detail')
            ->set('abbreviation', 'TD')
            ->set('code', 'TD001')
            ->set('value', 100.5)
            ->set('percentage', 10.5)
            ->set('max', 200)
            ->set('min', 50)
            ->set('stock', 0)
            ->set('status', true)
            ->call('store');

        $this->assertDatabaseMissing('characteristic_details', ['name' => 'Test Detail']);
    }

    #[Test]
    public function it_validates_percentage_max()
    {
        // Crear usuario y asignar permiso 'characteristic create'
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'characteristic create']);
        $user->givePermissionTo('characteristic create');

        $characteristic = Characteristic::factory()->create();

        Livewire::actingAs($user);

        Livewire::test(DetailCharacteristics::class)
            ->set('characteristic_id', $characteristic->id)
            ->set('name', 'Valid Name')
            ->set('percentage', 150) // Más de 100
            ->call('store')
            ->assertHasErrors(['percentage' => 'max']);
    }
}
