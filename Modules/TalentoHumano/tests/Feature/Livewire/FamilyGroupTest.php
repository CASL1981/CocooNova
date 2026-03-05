<?php

namespace Modules\TalentoHumano\Tests\Feature\Livewire;

use App\Models\Destination;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Modules\TalentoHumano\App\Livewire\FamilyGroup;
use Modules\TalentoHumano\App\Models\Employee;
use Modules\TalentoHumano\App\Models\FamilyGroup as FamilyGroupModel;
use PHPUnit\Framework\Attributes\Test;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class FamilyGroupTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected Employee $employee;

    protected Destination $destination;

    protected function setUp(): void
    {
        parent::setUp();

        // Crear destino (necesario para empleado)
        $this->destination = Destination::factory()->create();

        // Crear usuario
        $this->user = User::factory()->create();

        // Crear permisos
        Permission::firstOrCreate(['name' => 'familygroup create']);
        Permission::firstOrCreate(['name' => 'familygroup update']);
        Permission::firstOrCreate(['name' => 'familygroup delete']);

        // Asignar permisos al usuario
        $this->user->givePermissionTo('familygroup create');
        $this->user->givePermissionTo('familygroup update');
        $this->user->givePermissionTo('familygroup delete');

        // Crear empleado con destino válido
        $this->employee = Employee::factory()->for($this->destination, 'destination')->create();
    }

    // ==================== TESTS DE VALIDACIÓN ====================

    #[Test]
    public function it_validates_required_fields()
    {
        Livewire::actingAs($this->user);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->set('form.name', '')
            ->set('form.kinship', '')
            ->set('form.birth_date', '')
            ->call('store')
            ->assertHasErrors([
                'form.name' => 'required',
                'form.kinship' => 'required',
                'form.birth_date' => 'required',
            ]);
    }

    #[Test]
    public function it_validates_name_max_length()
    {
        Livewire::actingAs($this->user);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->set('form.name', str_repeat('A', 101)) // Excede 100 caracteres
            ->set('form.kinship', 'Padre')
            ->set('form.birth_date', '1990-01-15')
            ->call('store')
            ->assertHasErrors(['form.name' => 'max']);
    }

    #[Test]
    public function it_validates_kinship_max_length()
    {
        Livewire::actingAs($this->user);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->set('form.name', 'Juan Pérez')
            ->set('form.kinship', str_repeat('A', 101)) // Excede 100 caracteres
            ->set('form.birth_date', '1990-01-15')
            ->call('store')
            ->assertHasErrors(['form.kinship' => 'max']);
    }

    #[Test]
    public function it_validates_birth_date_format()
    {
        Livewire::actingAs($this->user);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->set('form.name', 'Juan Pérez')
            ->set('form.kinship', 'Padre')
            ->set('form.birth_date', 'invalid-date')
            ->call('store')
            ->assertHasErrors(['form.birth_date' => 'date']);
    }

    #[Test]
    public function it_validates_profession_max_length()
    {
        Livewire::actingAs($this->user);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->set('form.name', 'Juan Pérez')
            ->set('form.kinship', 'Padre')
            ->set('form.profession', str_repeat('A', 151)) // Excede 150 caracteres
            ->set('form.birth_date', '1990-01-15')
            ->call('store')
            ->assertHasErrors(['form.profession' => 'max']);
    }

    #[Test]
    public function it_validates_occupation_max_length()
    {
        Livewire::actingAs($this->user);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->set('form.name', 'Juan Pérez')
            ->set('form.kinship', 'Padre')
            ->set('form.occupation', str_repeat('A', 151)) // Excede 150 caracteres
            ->set('form.birth_date', '1990-01-15')
            ->call('store')
            ->assertHasErrors(['form.occupation' => 'max']);
    }

    #[Test]
    public function it_validates_company_max_length()
    {
        Livewire::actingAs($this->user);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->set('form.name', 'Juan Pérez')
            ->set('form.kinship', 'Padre')
            ->set('form.company', str_repeat('A', 151)) // Excede 150 caracteres
            ->set('form.birth_date', '1990-01-15')
            ->call('store')
            ->assertHasErrors(['form.company' => 'max']);
    }

    #[Test]
    public function it_validates_education_level_max_length()
    {
        Livewire::actingAs($this->user);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->set('form.name', 'Juan Pérez')
            ->set('form.kinship', 'Padre')
            ->set('form.education_level', str_repeat('A', 101)) // Excede 100 caracteres
            ->set('form.birth_date', '1990-01-15')
            ->call('store')
            ->assertHasErrors(['form.education_level' => 'max']);
    }

    #[Test]
    public function it_validates_illness_max_length()
    {
        Livewire::actingAs($this->user);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->set('form.name', 'Juan Pérez')
            ->set('form.kinship', 'Padre')
            ->set('form.illness', str_repeat('A', 256)) // Excede 255 caracteres
            ->set('form.birth_date', '1990-01-15')
            ->call('store')
            ->assertHasErrors(['form.illness' => 'max']);
    }

    #[Test]
    public function it_validates_unique_name_on_creation()
    {
        Livewire::actingAs($this->user);

        // Crear un grupo familiar existente
        FamilyGroupModel::factory()->create([
            'employee_id' => $this->employee->id,
            'name' => 'Juan Pérez',
        ]);

        // Intentar crear otro con el mismo nombre
        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->set('form.name', 'Juan Pérez')
            ->set('form.kinship', 'Padre')
            ->set('form.birth_date', '1990-01-15')
            ->call('store')
            ->assertHasErrors(['form.name' => 'unique']);
    }

    // ==================== TESTS DE CREACIÓN (CREATE) ====================

    #[Test]
    public function it_creates_family_group_with_valid_data()
    {
        Livewire::actingAs($this->user);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->set('form.identification', '3013003020')
            ->set('form.name', 'Juan Pérez López')
            ->set('form.kinship', 'Padre')
            ->set('form.profession', 'Ingeniero')
            ->set('form.occupation', 'Trabajo remoto')
            ->set('form.company', 'TechCorp')
            ->set('form.education_level', 'Licenciatura')
            ->set('form.birth_date', '1960-05-20')
            ->set('form.illness', 'Ninguna')
            ->set('form.phone', '3001234567')
            ->call('store');

        $this->assertDatabaseHas('humantalent_family_groups', [
            'employee_id' => $this->employee->id,
            'identification' => '3013003020',
            'name' => 'Juan Pérez López',
            'kinship' => 'Padre',
            'profession' => 'Ingeniero',
            'occupation' => 'Trabajo remoto',
            'company' => 'TechCorp',
            'education_level' => 'Licenciatura',
            'birth_date' => '1960-05-20',
            'illness' => 'Ninguna',
            'phone' => '3001234567',
        ]);
    }

    #[Test]
    public function it_creates_family_group_with_minimal_required_fields()
    {
        Livewire::actingAs($this->user);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->set('form.identification', '3013003020')
            ->set('form.name', 'María López')
            ->set('form.kinship', 'Madre')
            ->set('form.birth_date', '1965-08-10')
            ->call('store');

        $this->assertDatabaseHas('humantalent_family_groups', [
            'employee_id' => $this->employee->id,
            'identification' => '3013003020',
            'name' => 'María López',
            'kinship' => 'Madre',
            'birth_date' => '1965-08-10',
        ]);
    }

    #[Test]
    public function it_resets_form_after_successful_creation()
    {
        Livewire::actingAs($this->user);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->set('form.identification', '3013003020')
            ->set('form.name', 'Carlos Rodríguez')
            ->set('form.kinship', 'Hermano')
            ->set('form.birth_date', '1995-03-15')
            ->set('form.illness', 'Ninguna')
            ->call('store')
            ->assertSet('form.identification', '')
            ->assertSet('form.name', '')
            ->assertSet('form.kinship', '')
            ->assertSet('form.birth_date', null)
            ->assertSet('form.illness', null);
    }

    // ==================== TESTS DE LECTURA (READ) ====================

    #[Test]
    public function it_displays_family_groups_list()
    {
        Livewire::actingAs($this->user);

        $familyGroup1 = FamilyGroupModel::factory()->create([
            'employee_id' => $this->employee->id,
            'name' => 'Juan Pérez',
        ]);

        $familyGroup2 = FamilyGroupModel::factory()->create([
            'employee_id' => $this->employee->id,
            'name' => 'María López',
        ]);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->assertSee($familyGroup1->name)
            ->assertSee($familyGroup2->name);
    }

    #[Test]
    public function it_filters_family_groups_by_employee()
    {
        Livewire::actingAs($this->user);

        $employee1 = Employee::factory()->for($this->destination, 'destination')->create();
        $employee2 = Employee::factory()->for($this->destination, 'destination')->create();

        $familyGroup1 = FamilyGroupModel::factory()->create([
            'employee_id' => $employee1->id,
            'name' => 'Familia 1',
        ]);

        $familyGroup2 = FamilyGroupModel::factory()->create([
            'employee_id' => $employee2->id,
            'name' => 'Familia 2',
        ]);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $employee1->id,
        ])
            ->assertSee($familyGroup1->name)
            ->assertDontSee($familyGroup2->name);
    }

    #[Test]
    public function it_searches_family_groups_by_name()
    {
        Livewire::actingAs($this->user);

        FamilyGroupModel::factory()->create([
            'employee_id' => $this->employee->id,
            'name' => 'Juan Pérez',
            'kinship' => 'Padre',
        ]);

        FamilyGroupModel::factory()->create([
            'employee_id' => $this->employee->id,
            'name' => 'María López',
            'kinship' => 'Madre',
        ]);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->set('keyWord', 'Juan')
            ->assertSee('Juan Pérez')
            ->assertDontSee('María López');
    }

    #[Test]
    public function it_searches_family_groups_by_kinship()
    {
        Livewire::actingAs($this->user);

        FamilyGroupModel::factory()->create([
            'employee_id' => $this->employee->id,
            'name' => 'Juan Pérez',
            'kinship' => 'Padre',
        ]);

        FamilyGroupModel::factory()->create([
            'employee_id' => $this->employee->id,
            'name' => 'María López',
            'kinship' => 'Madre',
        ]);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->set('keyWord', 'Padre')
            ->assertSee('Juan Pérez')
            ->assertDontSee('María López');
    }

    #[Test]
    public function it_paginates_family_groups()
    {
        Livewire::actingAs($this->user);

        // Crear 15 grupos familiares (más de la paginación de 10)
        FamilyGroupModel::factory(15)->create([
            'employee_id' => $this->employee->id,
        ]);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->assertViewHas('familygroups')
            ->assertSet('paginators.page', 1);
    }

    // ==================== TESTS DE ACTUALIZACIÓN (UPDATE) ====================

    #[Test]
    public function it_loads_family_group_for_editing(): void
    {
        Livewire::actingAs($this->user);

        $familyGroup = FamilyGroupModel::factory()->create([
            'employee_id' => $this->employee->id,
            'identification' => '1067350125',
            'name' => 'Juan Pérez',
            'kinship' => 'Padre',
            'profession' => 'Ingeniero',
            'birth_date' => '1960-05-20',
            'illness' => 'Ninguna',
        ]);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->set('selected_id', $familyGroup->id)
            ->call('edit')
            ->assertSet('form.identification', '1067350125')
            ->assertSet('form.name', 'Juan Pérez')
            ->assertSet('form.kinship', 'Padre')
            ->assertSet('form.profession', 'Ingeniero')
            ->assertSet('form.birth_date', $familyGroup->birth_date->format('Y-m-d'))
            ->assertSet('form.illness', 'Ninguna')
            ->assertSet('show', true);
    }

    #[Test]
    public function it_updates_family_group_with_valid_data()
    {
        Livewire::actingAs($this->user);

        $familyGroup = FamilyGroupModel::factory()->create([
            'employee_id' => $this->employee->id,
            'name' => 'Juan Pérez',
            'identification' => '1067350125',
            'kinship' => 'Padre',
            'profession' => 'Ingeniero',
            'birth_date' => '1960-05-20',
            'illness' => 'Ninguna',
        ]);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->set('selected_id', $familyGroup->id)
            ->call('edit')
            ->set('form.name', 'Juan Carlos Pérez')
            ->set('form.identification', '1067350125')
            ->set('form.kinship', 'Tío')
            ->set('form.profession', 'Doctor')
            ->set('form.occupation', 'Médico general')
            ->set('form.company', 'Hospital Central')
            ->call('update');

        $this->assertDatabaseHas('humantalent_family_groups', [
            'id' => $familyGroup->id,
            'name' => 'Juan Carlos Pérez',
            'identification' => '1067350125',
            'kinship' => 'Tío',
            'profession' => 'Doctor',
            'occupation' => 'Médico general',
            'company' => 'Hospital Central',
        ]);
    }

    #[Test]
    public function it_validates_on_update()
    {
        Livewire::actingAs($this->user);

        $familyGroup = FamilyGroupModel::factory()->create([
            'employee_id' => $this->employee->id,
            'name' => 'Juan Pérez',
        ]);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->set('selected_id', $familyGroup->id)
            ->call('edit')
            ->set('form.name', '')
            ->set('form.kinship', '')
            ->call('update')
            ->assertHasErrors(['form.name' => 'required', 'form.kinship' => 'required']);
    }

    // ==================== TESTS DE ELIMINACIÓN (DELETE) ====================

    #[Test]
    public function it_deletes_family_group()
    {
        Livewire::actingAs($this->user);

        $familyGroup = FamilyGroupModel::factory()->create([
            'employee_id' => $this->employee->id,
            'name' => 'Juan Pérez',
        ]);

        $this->assertDatabaseHas('humantalent_family_groups', [
            'id' => $familyGroup->id,
        ]);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->set('selected_id', $familyGroup->id)
            ->dispatch('deleteItem');

        $this->assertDatabaseMissing('humantalent_family_groups', [
            'id' => $familyGroup->id,
        ]);
    }

    #[Test]
    public function it_does_not_delete_without_id()
    {
        Livewire::actingAs($this->user);

        $familyGroup = FamilyGroupModel::factory()->create([
            'employee_id' => $this->employee->id,
        ]);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->set('selected_id', 0)
            ->dispatch('deleteItem');

        $this->assertDatabaseHas('humantalent_family_groups', [
            'id' => $familyGroup->id,
        ]);
    }

    // ==================== TESTS DE PERMISOS ====================

    #[Test]
    public function it_prevents_creation_without_permission()
    {
        $userWithoutPermission = User::factory()->create();

        Livewire::actingAs($userWithoutPermission);

        Livewire::test(FamilyGroup::class, ['employeeId' => $this->employee->id])
            ->set('form.identification', '3017003020')
            ->set('form.name', 'Juan Pérez')
            ->set('form.kinship', 'Padre')
            ->set('form.birth_date', '1960-01-01')
            ->call('store')
            ->assertForbidden();  // ← Assert 403 automático
    }

    #[Test]
    public function it_prevents_update_without_permission()
    {
        $userWithoutPermission = User::factory()->create();

        $familyGroup = FamilyGroupModel::factory()
            ->create(['employee_id' => $this->employee->id]);

        Livewire::actingAs($userWithoutPermission);

        Livewire::test(FamilyGroup::class, ['employeeId' => $this->employee->id])
            ->set('selected_id', $familyGroup->id)
            ->call('edit')  // Remueve expectException temporalmente
            ->assertForbidden();  // ← Mejor: assert 403 si policy
    }


    #[Test]
    public function it_prevents_delete_without_permission()
    {
        $userWithoutPermission = User::factory()->create();

        $familyGroup = FamilyGroupModel::factory()->create([
            'employee_id' => $this->employee->id,
        ]);

        Livewire::actingAs($userWithoutPermission);

        $this->expectException(\Exception::class);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->set('selected_id', $familyGroup->id)
            ->dispatch('delete');
    }

    // ==================== TESTS DE COMPORTAMIENTO DEL COMPONENTE ====================

    #[Test]
    public function it_mounts_with_employee_data()
    {
        Livewire::actingAs($this->user);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->assertSet('employeeId', $this->employee->id);
    }

    #[Test]
    public function it_resets_input_clears_errors_and_validation()
    {
        Livewire::actingAs($this->user);

        Livewire::test(FamilyGroup::class, [
            'employeeId' => $this->employee->id,
        ])
            ->set('form.name', '')
            ->set('form.kinship', '')
            ->call('store')
            ->assertHasErrors()
            ->call('resetInput')
            ->assertHasNoErrors()
            ->assertSet('form.name', '')
            ->assertSet('form.kinship', '')
            ->assertSet('selected_id', 0)
            ->assertSet('show', false);
    }
}
