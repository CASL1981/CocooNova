<?php

namespace Modules\TalentoHumano\App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\WithCrudOperations;
use App\Traits\WithTableOperations;
use Modules\TalentoHumano\App\Livewire\Forms\AcademicInfoForm;
use Modules\TalentoHumano\App\Models\AcademicInfo;

class AcademicInfoManager extends Component
{
    use WithPagination;
    use WithCrudOperations;
    use WithTableOperations;

    public AcademicInfoForm $form;

    // ---- Propiedades del componente (no se resetean) ----
    public $employeeId;

    public $showModalAcademic = false;

    public function mount(int $employeeId): void
    {
        $this->employeeId = $employeeId;
    }

    public function hydrate(): void
    {
        // Aseguramos que el Form Object siempre tenga el employee_id actualizado
        $this->form->employee_id = $this->employeeId;

        $this->permissionModel = 'academicinfo';

        $this->messageModel = 'Información Académica';

        $this->exportable = 'Modules\TalentoHumano\App\Exports\AcademicInfoExport';
        $this->model      = 'Modules\TalentoHumano\App\Models\AcademicInfo';
    }

    // ---- Render ----

    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $academicInfos = new AcademicInfo();

        $academicInfos = $academicInfos->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)
            ->where('employee_id', $this->employeeId)
            ->orderBy('completion_date', 'desc')
            ->paginate(10);

        return view('talentohumano::livewire.academicinfos.index', compact('academicInfos'));
    }

    // ---- CRUD Actions ----

    public function store(): void
    {
        can('academicinfo create');

        $this->form->validate();

        $this->form->store();

        $this->cancel();
        $this->dispatch('alert', ['type' => 'success', 'message' => 'Información Académica creada correctamente.']);
    }

    /**
     * Carga los valores del registro seleccionado para edición
     */
    public function edit(): void
    {
        can('academicinfo update');

        $this->form->setAcademicInfo($this->selected_id);

        $this->showModalAcademic = true;
    }

    /**
     * Actualiza el registro seleccionado en la base de datos
     */
    public function update(): void
    {
        can('academicinfo update');

        $this->form->validate();

        if ($this->selected_id) {
            $record = AcademicInfo::find($this->selected_id);
            $record->update($this->form->all());

            $this->resetInput();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Información Académica actualizada correctamente.']);
        }
    }

    /**
     * Reinicia los campos del formulario y errores de validación
     */
    public function resetInput(): void
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->resetExcept(['model', 'exportable', 'keyWord', 'employeeId']);
    }
}
