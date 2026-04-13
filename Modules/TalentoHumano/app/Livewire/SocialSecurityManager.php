<?php

namespace Modules\Talentohumano\App\Livewire;

use App\Traits\WithCrudOperations;
use App\Traits\WithTableOperations;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Excel;
use Modules\TalentoHumano\App\Enums\ContractType;
use Modules\TalentoHumano\App\Livewire\Forms\SocialSecurityForm;
use Modules\TalentoHumano\App\Models\SocialSecurity;
use Symfony\Component\HttpFoundation\Response;

class SocialSecurityManager extends Component
{
    use WithPagination;
    use WithCrudOperations;
    use WithTableOperations;

    public SocialSecurityForm $form;

    // ---- Propiedades del componente (no se resetean) ----
    public $contractId;

    public $contractType = [];

    public $showModalSocialSecurity = false;

    public function mount(int $contractId): void
    {
        $this->contractId = $contractId;
    }

    public function hydrate(): void
    {
        // Aseguramos que el Form Object siempre tenga el contract_id actualizado
        $this->form->contract_id = $this->contractId;

        $this->permissionModel = 'socialsecurity';

        $this->messageModel = 'Información de Seguridad Social';

        $this->exportable = 'Modules\TalentoHumano\App\Exports\SocialSecurityExport';
        $this->model      = 'Modules\TalentoHumano\App\Models\SocialSecurity';

        $this->contractType = ContractType::toSelectArray();
    }

    // ---- Render ----

    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $socialSecurities = new SocialSecurity();

        $socialSecurities = $socialSecurities->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)
            ->where('contract_id', $this->contractId)
            ->paginate(10);

        return view('talentohumano::livewire.socialsecurity.index', compact('socialSecurities'));
    }

    // ---- CRUD Actions ----

    public function store(): void
    {
        can('socialsecurity create');

        $this->form->validate();

        $this->form->store();

        $this->cancel();
        $this->dispatch('alert', ['type' => 'success', 'message' => 'Información de Seguridad Social creada correctamente.']);
    }

    /**
     * Carga los valores del registro seleccionado para edición
     */
    public function edit(): void
    {
        can('socialsecurity update');

        $this->form->setSocialSecurity($this->selected_id);

        $this->showModalSocialSecurity = true;
    }

    /**
     * Actualiza el registro seleccionado en la base de datos
     */
    public function update(): void
    {
        can('socialsecurity update');

        $this->form->validate();

        if ($this->selected_id) {
            $record = SocialSecurity::find($this->selected_id);
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
        $this->resetExcept(['model', 'exportable', 'keyWord', 'contractId']);
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
                ->where('employee_id', $this->contractId)
                ->get();

        return Excel::download(new $this->exportable($query), 'filename.'.$ext);
    }
}
        