<?php

namespace Modules\Talentohumano\App\Livewire;

use App\Traits\WithCrudOperations;
use App\Traits\WithTableOperations;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\TalentoHumano\App\Enums\ContractType;
use Modules\Talentohumano\App\Livewire\Forms\ContractForm;
use Modules\TalentoHumano\App\Models\Contract;

class ContractManager extends Component
{
    use WithPagination;
    use WithCrudOperations;
    use WithTableOperations;

    public ContractForm $form;

    public $employees;

    public $contractType = [];

    public $showActive = true; // Nueva propiedad para controlar la visualización de contratos activos/inactivos

     /**
     * Configura las propiedades del componente al cargarlo.
     */
        
    public function hydrate(): void
    {
        $this->permissionModel = 'contracts';

        $this->messageModel = 'Contrato';

        $this->exportable = 'Modules\TalentoHumano\App\Exports\ContractExport';
        $this->model      = 'Modules\TalentoHumano\App\Models\Contract';
        $this->contractType = ContractType::toSelectArray(); // Convierte el enum a un array para usar en un select
    }
    
    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $contracts = new Contract();

        $contracts = $contracts->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)->orderBy('hiring_date', 'desc');

        if ($this->showActive) {
            $contracts = $contracts->where('status', true)->paginate(10);
        } else {
            $contracts = $contracts->paginate(10);
        }

        return view('talentohumano::livewire.contracts.index', compact('contracts'));
    }

    // Reinicia la paginación al cambiar el estado de showActive
    public function toggleShowActive(): void
    {
        $this->resetPage();
    }

    /**
     * carga el formulario con los datos del contrato seleccionado para su edición.
     * @return void
     */
    public function edit(): void
    {
        can('contracts update');

        $this->form->setContract($this->selected_id);

        $this->show = true;
    }

    /**
    * Actualiza el contrato seleccionado en la base de datos.
    * @return void
    */
    public function update(): void
    {
        can('contracts update');
        
        $this->form->validate();

        if ($this->selected_id) {
            $record = Contract::find($this->selected_id);
            $record->update($this->form->all());

            $this->resetInput();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Contrato actualizado correctamente.']);
        }
    }

    public function detailContract(): mixed
    {
        can('contracts update');

        $status = Contract::where('id', $this->selected_id)->get('status')->toArray();

        if ($status[0]['status']) {
            session()->put('contractId', $this->selected_id);

            return redirect()->route('talentohumano.manage-contract');
        }

        $this->selectedModel = []; // limpiamos todos los item seleccionados
        $this->selectAll = false;

        return $this->dispatch('alert', ['type' => 'warning', 'message' => 'Contrato no se encuentra activo']);
    }

    public function getPDFContract()
    {
        can('contracts read');
        
        $contract = Contract::with('employee')->findOrFail($this->selected_id);
        
        // Emitir evento para abrir el PDF en una nueva pestaña
        $this->dispatch('open-contract-pdf', url: route('contract.pdf', [
            'contract' => $contract->uuid,
        ]));
    }
}
        