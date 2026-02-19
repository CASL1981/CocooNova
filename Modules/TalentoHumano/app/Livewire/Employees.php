<?php

namespace Modules\Talentohumano\App\Livewire;

use App\Models\Destination;
use App\Traits\WithCrudOperations;
use App\Traits\WithTableOperations;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Talentohumano\App\Livewire\Forms\EmployeeForm;
use Modules\TalentoHumano\App\Models\Employee;

class Employees extends Component
{
    use WithPagination;
    use WithCrudOperations;
    use WithTableOperations;
    
    public EmployeeForm $form;    

    public $destinations;

    public function hydrate()
    {
        $this->permissionModel = 'employee';

        $this->messageModel = 'Empleado Creado';

        $this->exportable ='Modules\TalentoHumano\App\Exports\EmployeesExport';
        $this->model = 'Modules\TalentoHumano\App\Models\Employee';

        $this->destinations = Destination::pluck('name', 'id')->toArray();
    }
    
    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $employees = new Employee();

        $employees = $employees->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)
                    ->with('destination')->paginate(10);
                    
        return view('talentohumano::livewire.employees.index', compact('employees'));
    }

    /**
     * returns the values ​​of the s to edit
     * @return void
     */
    public function edit()
    {
        can('employees update');

        $record = Employee::findOrFail($this->selected_id);
        
        $this->form->id = $record->id;
        $this->form->identification = $record->identification;
        $this->form->first_name = $record->first_name;
        $this->form->last_name = $record->last_name;
        $this->form->type_document = $record->type_document;
        $this->form->address = $record->address;
        $this->form->cel_phone = $record->cel_phone;
        $this->form->cel_phone2 = $record->cel_phone2;
        $this->form->email = $record->email;
        $this->form->gender = $record->gender;
        $this->form->birth_date = $record->birth_date->format('Y-m-d');
        $this->form->blood_type = $record->blood_type;
        $this->form->expedition_department = $record->expedition_department;
        $this->form->expedition_city = $record->expedition_city;
        $this->form->military_service = $record->military_service;
        $this->form->type_militart = $record->type_militart;
        $this->form->district = $record->district;
        $this->form->department = $record->department;
        $this->form->city = $record->city;
        $this->form->estrato = $record->estrato;
        $this->form->type_housing = $record->type_housing;
        $this->form->number_children = $record->number_children;
        $this->form->department_birth = $record->department_birth;
        $this->form->city_birth = $record->city_birth;
        $this->form->blood_type = $record->blood_type;
        $this->form->marital_status = $record->marital_status;
        $this->form->position = $record->position;
        $this->form->area = $record->area;
        $this->form->destination_id = $record->destination_id;
        $this->form->vendedor = $record->vendedor;
        $this->form->auditor = $record->auditor;
        $this->form->approve = $record->approve;

        $this->show = true;
    }

    public function update()
    {
        // can('employees update');

        $validate = $this->validate();

        if ($this->selected_id) {

            $record = Employee::find($this->selected_id);

            $record->update($validate);

            // reiniciamos los campos
            $this->cancel();
            $this->selected_id = 0;

            // Mensaje de actualización
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Empleado actualizado correctamente.']);
        }
    }

    public function manageProfile(): mixed
    {
        // can('employees manage-profile');

        $status = Employee::where('id', $this->selected_id)->get('status')->toArray();

        if($status[0]['status'])
        {
            session()->put('employeeId', $this->selected_id);

            return redirect()->route('talentohumano.manage-profile');
        }

        $this->selectedModel = []; //limpiamos todos los item seleccionados
        $this->selectAll = false;
        return $this->dispatch('alert', ['type' => 'warning', 'message' => 'Empleado no se encuentra activo']);
    }
}
        