<?php

namespace Modules\Talentohumano\App\Livewire;

use App\Traits\WithCrudOperations;
use App\Traits\WithTableOperations;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Talentohumano\App\Livewire\Forms\FamilyGroupForm;
use Modules\TalentoHumano\App\Models\FamilyGroup as ModelsFamilyGroup;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;

class FamilyGroup extends Component
{
    use WithCrudOperations;
    use WithPagination;
    use WithTableOperations;

    // Form Object para manejar la creación y edición de registros
    public FamilyGroupForm $form;

    // Para recibir el empleado desde el componente padre (manage-profile)
    public $employeeId;

    public function mount($employeeId): void
    {
        $this->employeeId = $employeeId;
    }

    public function hydrate(): void
    {
        // Aseguramos que el Form Object siempre tenga el employee_id y employee_fullName actualizados
        $this->form->employee_id = $this->employeeId;

        $this->permissionModel = 'familygroup';

        $this->messageModel = 'Grupo Familiar Creado';

        $this->exportable = 'Modules\TalentoHumano\App\Exports\FamilyGroupExport';
        $this->model = 'Modules\TalentoHumano\App\Models\FamilyGroup';
    }

    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $familygroups = new ModelsFamilyGroup;

        $familygroups = $familygroups->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)
            ->where('employee_id', $this->employeeId)
            ->paginate(10);

        return view('talentohumano::livewire.familygroup.index', compact('familygroups'));
    }

    /**
     * Almacena un nuevo registro en la base de datos
     */
    public function store(): void
    {
        can('familygroup create');

        $this->form->validate();  // Valida rules() del form

        $this->form->store();

        // reinicamos los campos
        $this->cancel();
        $this->dispatch('alert', ['type' => 'success', 'message' => 'Grupo Familiar creado correctamente.']);
    }

    /**
     * returns the values ​​of the destinations to edit
     *
     * @return void
     */
    public function edit(): void
    {
        can('familygroup update');

        $record = ModelsFamilyGroup::findOrFail($this->selected_id);

        $this->form->id = $record->id;
        $this->form->employee_id = $record->employee_id;
        $this->form->identification = $record->identification;
        $this->form->name = $record->name;
        $this->form->kinship = $record->kinship;
        $this->form->profession = $record->profession;
        $this->form->occupation = $record->occupation;
        $this->form->company = $record->company;
        $this->form->education_level = $record->education_level;
        $this->form->birth_date = $record->birth_date->format('Y-m-d');
        $this->form->illness = $record->illness ?? '';

        $this->show = true;
    }

    /**
     * Actualiza el registro seleccionado en la base de datos
     */
    public function update(): void
    {
        can('familygroup update');

        // Validar usando el Form Object que tiene la regla unique con ignore($this->form->id)
        $this->form->validate();

        if ($this->selected_id) {
            $record = ModelsFamilyGroup::find($this->selected_id);
            $record->update($this->form->all());

            $this->resetInput();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Grupo Familiar actualizado correctamente.']);
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

    /**
     * Exporta los datos en el formato especificado (csv, xlsx, pdf).
     *
     * @param  string  $ext  La extensión del archivo de exportación.
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export($ext)
    {
        abort_if(! in_array($ext, ['csv', 'xlsx', 'pdf']), Response::HTTP_NOT_FOUND);

        $query = new $this->model;

        $query = $query->QueryExport($this->keyWord, $this->sortField, $this->sortDirection)
                ->where('employee_id', $this->employeeId)
                ->get();

        return Excel::download(new $this->exportable($query), 'filename.'.$ext);
    }
}
