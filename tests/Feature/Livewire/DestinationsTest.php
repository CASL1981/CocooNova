<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Destinations;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class DestinationsTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_validates_required_fields()
    {
        // Crear usuario y asignar permiso 'destination create'
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'destination create']);
        $user->givePermissionTo('destination create');

        Livewire::actingAs($user);

        Livewire::test(Destinations::class)
            ->set('costcenter', '')
            ->set('name', '')
            ->set('status', '')
            ->call('store')
            ->assertHasErrors(['costcenter' => 'required', 'name' => 'required', 'status' => 'required']);
    }

    #[Test]
    public function it_validates_name_min_length()
    {
        // Crear usuario y asignar permiso 'destination create'
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'destination create']);
        $user->givePermissionTo('destination create');

        Livewire::actingAs($user);

        Livewire::test(Destinations::class)
            ->set('costcenter', 'CC001')
            ->set('name', 'AB') // Menos de 3 caracteres
            ->set('status', 'active')
            ->call('store')
            ->assertHasErrors(['name' => 'min']);
    }

    #[Test]
    public function it_validates_name_max_length()
    {
        // Crear usuario y asignar permiso 'destination create'
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'destination create']);
        $user->givePermissionTo('destination create');

        Livewire::actingAs($user);

        Livewire::test(Destinations::class)
            ->set('costcenter', 'CC001')
            ->set('name', str_repeat('A', 101)) // Más de 100 caracteres
            ->set('status', 'active')
            ->call('store')
            ->assertHasErrors(['name' => 'max']);
    }

    #[Test]
    public function it_validates_minimun_is_numeric()
    {
        // Crear usuario y asignar permiso 'destination create'
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'destination create']);
        $user->givePermissionTo('destination create');

        Livewire::actingAs($user);

        Livewire::test(Destinations::class)
            ->set('costcenter', 'CC001')
            ->set('name', 'Valid Name')
            ->set('minimun', 'not_a_number')
            ->set('status', 'active')
            ->call('store')
            ->assertHasErrors(['minimun' => 'numeric']);
    }

    #[Test]
    public function it_validates_maximun_is_numeric()
    {
        // Crear usuario y asignar permiso 'destination create'
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'destination create']);
        $user->givePermissionTo('destination create');

        Livewire::actingAs($user);

        Livewire::test(Destinations::class)
            ->set('costcenter', 'CC001')
            ->set('name', 'Valid Name')
            ->set('maximun', 'not_a_number')
            ->set('status', 'active')
            ->call('store')
            ->assertHasErrors(['maximun' => 'numeric']);
    }

    #[Test]
    public function it_creates_destination_with_valid_data()
    {
        // Crear usuario y asignar permiso 'destination create'
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'destination create']);
        $user->givePermissionTo('destination create');

        Livewire::actingAs($user);

        Livewire::test(Destinations::class)
            ->set('costcenter', 'CC001')
            ->set('name', 'Valid Destination')
            ->set('address', '123 Main St')
            ->set('phone', '123-456-7890')
            ->set('location', 'City, State')
            ->set('minimun', 100)
            ->set('maximun', 500)
            ->set('status', 'active')
            ->call('store');

        $this->assertDatabaseHas('destinations', [
            'costcenter' => 'CC001',
            'name' => 'Valid Destination',
            'status' => 'active',
        ]);
    }

    #[Test]
    public function it_updates_destination_with_valid_data()
    {
        // Crear usuario y asignar permiso 'destination update'
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'destination update']);
        $user->givePermissionTo('destination update');

        Livewire::actingAs($user);

        $destination = \App\Models\Destination::factory()->create();

        Livewire::test(Destinations::class)
            ->set('selected_id', $destination->id)
            ->call('edit')
            ->set('costcenter', 'CC002')
            ->set('name', 'Updated Destination')
            ->set('status', 'inactive')
            ->call('method');

        $this->assertDatabaseHas('destinations', [
            'id' => $destination->id,
            'costcenter' => 'CC002',
            'name' => 'Updated Destination',
            'status' => 'inactive',
        ]);
    }

    #[Test]
    public function it_can_toggle_status_of_selected_destinations()
    {
        // Crear usuario y asignar permiso 'destination toggle'
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'destination toggle']);
        $user->givePermissionTo('destination toggle');

        Livewire::actingAs($user);

        $destination1 = \App\Models\Destination::factory()->create(['status' => 'active']);
        $destination2 = \App\Models\Destination::factory()->create(['status' => 'active']);

        Livewire::test(Destinations::class)
            ->set('selectedModel', [$destination1->id, $destination2->id])
            ->call('toggleItem');

        $this->assertDatabaseHas('destinations', [
            'id' => $destination1->id,
            'status' => false, // Asumiendo que cambia a false
        ]);

        $this->assertDatabaseHas('destinations', [
            'id' => $destination2->id,
            'status' => false,
        ]);
    }

    #[Test]
    public function it_can_duplicate_a_selected_destination()
    {
        // Crear usuario y asignar permiso 'destination create'
        $user = User::factory()->create();
        Permission::firstOrCreate(['name' => 'destination create']);
        $user->givePermissionTo('destination create');

        Livewire::actingAs($user);

        $destination = \App\Models\Destination::factory()->create(['name' => 'Original Destination']);

        Livewire::test(Destinations::class)
            ->set('selected_id', $destination->id)
            ->call('duplicate');

        $this->assertDatabaseHas('destinations', [
            'name' => 'Original Destination (Copia)',
            'costcenter' => $destination->costcenter,
            'address' => $destination->address,
            // Otros campos similares
        ]);

        $this->assertDatabaseCount('destinations', 2); // Original + copia
    }
}