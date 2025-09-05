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
        $component = Livewire::test(Users::class)
            ->set('name', 'Juan')
            ->set('lastname', 'Pérez')
            ->set('email', 'juan@example.com')
            ->set('identification', '12345678')
            ->set('area', 'Administrativa')
            ->set('status', 'active')
            ->set('role_id', 1)
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
        $component = Livewire::test(Users::class)
            ->set('name', '')
            ->set('lastname', '')
            ->set('email', '')
            ->set('identification', '')
            ->call('store');

        $component->assertHasErrors(['name', 'lastname', 'email', 'identification']);
    }

    /** @test */
    public function it_prevents_duplicate_email_and_identification()
    {
        User::factory()->create([
            'email' => 'juan@example.com',
            'identification' => '12345678',
            'password' => bcrypt('password123'),
        ]);

        $component = Livewire::test(Users::class)
            ->set('name', 'Juan')
            ->set('lastname', 'Pérez')
            ->set('email', 'juan@example.com')
            ->set('identification', '12345678')
            ->call('store');

        $component->assertHasErrors(['email', 'identification']);
    }

    /** @test */
    public function it_can_list_users()
    {
        User::factory()->count(3)->create();
        $component = Livewire::test(Users::class);
        $this->assertCount(3, $component->viewData('users'));
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

        $component = Livewire::test(Users::class)
            ->set('selected_id', $user->id)
            ->set('identification', '87654321')
            ->set('name', 'Carlos')
            ->set('lastname', 'Gómez')
            ->set('area', 'Administrativa')
            ->set('email', 'carlos@example.com')
            ->set('status', 1)
            ->set('role_id', 2)
            ->set('destination', 1000)
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
        $component = Livewire::test(Users::class)
            ->set('selected_id', $user->id)
            ->set('name', '')
            ->set('lastname', '')
            ->set('email', '')
            ->set('identification', '')
            ->call('update');

        $component->assertHasErrors(['name', 'lastname', 'email', 'identification']);
    }

    /** @test */
    public function it_can_delete_a_user()
    {
        $user = User::factory()->create();
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
        $component = Livewire::test(Users::class)
            ->set('selected_id', 9999)
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
        Livewire::test(Users::class)
            ->set('identification', '123') // menos de 7 dígitos
            ->set('name', $base['name'])
            ->set('lastname', $base['lastname'])
            ->set('email', $base['email'])
            ->set('area', $base['area'])
            ->set('status', $base['status'])
            ->set('role_id', $base['role_id'])
            ->set('destination', $base['destination'])
            ->call('store')
            ->assertHasErrors(['identification']);

        Livewire::test(Users::class)
            ->set('identification', '1234567890123') // más de 12 dígitos
            ->set('name', $base['name'])
            ->set('lastname', $base['lastname'])
            ->set('email', 'test2@example.com')
            ->set('area', $base['area'])
            ->set('status', $base['status'])
            ->set('role_id', $base['role_id'])
            ->set('destination', $base['destination'])
            ->call('store')
            ->assertHasErrors(['identification']);

        Livewire::test(Users::class)
            ->set('identification', 'abc123456') // caracteres no numéricos
            ->set('name', $base['name'])
            ->set('lastname', $base['lastname'])
            ->set('email', 'test3@example.com')
            ->set('area', $base['area'])
            ->set('status', $base['status'])
            ->set('role_id', $base['role_id'])
            ->set('destination', $base['destination'])
            ->call('store')
            ->assertHasErrors(['identification']);
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
        Livewire::test(Users::class)
            ->set('identification', $base['identification'])
            ->set('name', $base['name'])
            ->set('lastname', $base['lastname'])
            ->set('email', 'not-an-email')
            ->set('area', $base['area'])
            ->set('status', $base['status'])
            ->set('role_id', $base['role_id'])
            ->set('destination', $base['destination'])
            ->call('store')
            ->assertHasErrors(['email']);
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
        Livewire::test(Users::class)
            ->set('identification', $base['identification'])
            ->set('name', $base['name'])
            ->set('lastname', $base['lastname'])
            ->set('email', $base['email'])
            ->set('area', 'NoValida')
            ->set('status', $base['status'])
            ->set('role_id', $base['role_id'])
            ->set('destination', $base['destination'])
            ->call('store')
            ->assertHasErrors(['area']);
    }

    /** @test */
    // El campo status es nullable, así que no requiere validación estricta de valor
}
