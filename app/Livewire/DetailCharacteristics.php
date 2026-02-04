<?php

namespace App\Livewire;

use App\Models\CharacteristicDetail;
use App\Traits\WithCrudOperations;
use App\Traits\WithTableOperations;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class DetailCharacteristics extends Component
{
    use WithCrudOperations;
    use WithPagination;
    use WithTableOperations;

    public $characteristic_id;

    public $name;

    public $abbreviation;

    public $code;

    public $value;

    public $percentage;

    public $max;

    public $min;

    public $stock;

    public $status;

    public $showModal = false;

    public $characteristic_selected = [];

    public function hydrate(): void
    {
        $this->permissionModel = 'characteristic';
        $this->model = 'App\Models\CharacteristicDetail';
        $this->exportable = 'App\Exports\CharacteristicDetailsExport';
    }

    #[On('characteristic_id')]
    public function selectdId($id): void
    {
        $this->characteristic_selected = $id;

        $this->render();
    }

    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $detailCharacteristics = CharacteristicDetail::where('characteristic_id', $this->characteristic_selected)
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.detail-characteristics.index', compact('detailCharacteristics'));
    }

    protected function rules(): array
    {
        return [
            'name' => 'required|min:3|max:100',
            'abbreviation' => 'nullable|string|max:100',
            'code' => 'nullable|string|max:50',
            'value' => 'nullable|numeric',
            'percentage' => 'nullable|numeric|min:0|max:100',
            'max' => 'nullable|numeric',
            'min' => 'nullable|numeric',
            'stock' => 'nullable|numeric',
        ];
    }

    public function setShowModal(): void
    {
        if (empty($this->characteristic_selected)) {
            $this->dispatch('alert', ['type' => 'warning', 'message' => 'Seleccione una característica antes de crear un detalle.']);
        } else {
            $this->showModal = true;
        }

    }

    public function store()
    {
        can('characteristic create');

        $validate = $this->validate();

        if (empty($this->characteristic_selected)) {
            $this->dispatch('alert', ['type' => 'warning', 'message' => 'Seleccione una característica antes de crear un detalle.']);
        } else {
            $validate['characteristic_id'] = $this->characteristic_selected;
        }

        CharacteristicDetail::create($validate);

        $this->cancel();
        $this->dispatch('alert', ['type' => 'success', 'message' => 'Detalle de característica creado correctamente.']);
    }

    public function edit()
    {
        can('characteristic update');

        $record = CharacteristicDetail::findOrFail($this->selected_id);

        $this->name = $record->name;
        $this->abbreviation = $record->abbreviation;
        $this->code = $record->code;
        $this->value = $record->value;
        $this->percentage = $record->percentage;
        $this->max = $record->max;
        $this->min = $record->min;
        $this->stock = $record->stock;

        $this->showModal = true;
    }

    public function update()
    {
        can('characteristic update');

        $validate = $this->validate();

        if ($this->selected_id) {
            $record = CharacteristicDetail::find($this->selected_id);
            $record->update($validate);

            $this->cancel();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Detalle de característica actualizado correctamente.']);
        }
    }

    #[On('deleteItem')]
    public function delete()
    {
        can('characteristic delete');

        if ($this->selected_id) {
            $record = CharacteristicDetail::find($this->selected_id);
            $record->delete();

            $this->resetInput();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Detalle de característica eliminado correctamente.']);
        }
    }

    public function duplicate()
    {
        can('characteristic create');

        if ($this->selected_id) {
            $record = CharacteristicDetail::find($this->selected_id);
            $newRecord = $record->replicate();
            $newRecord->name = $record->name.' (Copia)';
            $newRecord->save();

            $this->dispatch('alert', ['type' => 'success', 'message' => 'Detalle de característica duplicado correctamente.']);
        }
    }

    public function resetInput()
    {
        $this->resetExcept(['model', 'exportable', 'keyWord', 'characteristic_selected']);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function closed()
    {
        $this->resetInput();
        $this->showModal = false;
    }
}
