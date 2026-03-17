<?php

namespace Modules\TalentoHumano\App\Livewire;

use App\Traits\WithCrudOperations;
use App\Traits\WithTableOperations;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\TalentoHumano\App\Livewire\Forms\WorkExperienceForm;
use Modules\TalentoHumano\App\Models\WorkExperience;

class WorkExperiencesManager extends Component
{
    use WithPagination;
    use WithCrudOperations;
    use WithTableOperations;

    public WorkExperienceForm $form;

    // ---- Propiedades del componente (no se resetean) ----
    public $employeeId;

    public $showModal = false;
    

    public function mount(int $employeeId): void
    {
        $this->employeeId = $employeeId;
    }

    public function hydrate(): void
    {
        // Aseguramos que el Form Object siempre tenga el employee_id y employee_fullName actualizados
        $this->form->employee_id = $this->employeeId;

        $this->permissionModel = 'workexperience';

        $this->messageModel = 'Experiencia Laboral Creada';

        $this->exportable = 'Modules\TalentoHumano\App\Exports\WorkExperienceExport';
        $this->model = 'Modules\TalentoHumano\App\Models\WorkExperience';
    }
        
    // ---- Render ----

    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $workexperiences = new WorkExperience();

        $workexperiences = $workexperiences->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)
            ->where('employee_id', $this->employeeId)
            ->orderBy('start_date', 'desc')
            ->paginate(10);

        return view('talentohumano::livewire.workexperiences.index', compact('workexperiences'));
    }

    // ---- CRUD Actions ----

    public function store(): void
    {
        can('workexperience create');

        $this->form->validate();  // Valida rules() del form

        $this->form->store();
        
        // reinicamos los campos
        $this->cancel();
        $this->dispatch('alert', ['type' => 'success', 'message' => 'Grupo Familiar creado correctamente.']);
    }

    /** returns the values ​​of the destinations to edit
     *
     * @return void
     */
    public function edit(): void
    {
        can('workexperience update');

        $this->form->setWorkExperience($this->selected_id);
        
        $this->showModal = true;
    }

    /** update the selected record in the database
     *
     * @return void
     */
    public function update(): void
    {
        can('workexperience update');

        // Validar usando el Form Object que tiene la regla unique con ignore($this->form->id)
        $this->form->validate();

        if ($this->selected_id) {
            $record = WorkExperience::find($this->selected_id);
            $record->update($this->form->all());

            $this->resetInput();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Experiencia Laboral actualizada correctamente.']);
        }
    }


        /**
     * Reinicia los campos del formulario y los errores de validación
     */
    public function resetInput(): void
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->resetExcept(['model', 'exportable', 'keyWord', 'employeeId']);
    }
    
}
