<?php

namespace Modules\TalentoHumano\App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\WithCrudOperations;
use App\Traits\WithTableOperations;
use Maatwebsite\Excel\Facades\Excel;
use Modules\TalentoHumano\App\Livewire\Forms\EvaluationForm;
use Modules\TalentoHumano\App\Models\Evaluation;
use Symfony\Component\HttpFoundation\Response;

class EvaluationManager extends Component
{
    use WithPagination;
    use WithCrudOperations;
    use WithTableOperations;

    public EvaluationForm $form;

    // ---- Propiedades del componente (no se resetean) ----
    public $employeeId;

    public $showModalEvaluation = false;

    public function mount(int $employeeId): void
    {
        $this->employeeId = $employeeId;
    }

    public function hydrate(): void
    {
        // Aseguramos que el Form Object siempre tenga el employee_id actualizado
        $this->form->employee_id = $this->employeeId;

        $this->permissionModel = 'evaluation';

        $this->messageModel = 'Evaluación';

        $this->exportable = 'Modules\TalentoHumano\App\Exports\EvaluationExport';
        $this->model      = 'Modules\TalentoHumano\App\Models\Evaluation';
    }

    // ---- Render ----

    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $evaluations = new Evaluation();

        $evaluations = $evaluations->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)
            ->where('employee_id', $this->employeeId)
            ->orderBy('date', 'desc')
            ->paginate(10);

        return view('talentohumano::livewire.evaluations.index', compact('evaluations'));
    }

    // ---- CRUD Actions ----

    public function store(): void
    {
        can('evaluation create');

        $this->form->validate();

        $this->form->store();

        $this->cancel();
        $this->dispatch('alert', ['type' => 'success', 'message' => 'Evaluación creada correctamente.']);
    }

    /**
     * Carga los valores del registro seleccionado para edición
     */
    public function edit(): void
    {
        can('evaluation update');

        $this->form->setEvaluation($this->selected_id);

        $this->showModalEvaluation = true;
    }

    /**
     * Actualiza el registro seleccionado en la base de datos
     */
    public function update(): void
    {
        can('evaluation update');

        $this->form->validate();

        if ($this->selected_id) {
            $record = Evaluation::find($this->selected_id);
            $record->update($this->form->all());

            $this->resetInput();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Evaluación actualizada correctamente.']);
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
