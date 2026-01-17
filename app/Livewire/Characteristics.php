<?php

namespace App\Livewire;

use App\Models\Characteristic;
use App\Traits\WithCrudOperations;
use App\Traits\WithTableOperations;
use Livewire\Component;
use Livewire\WithPagination;

class Characteristics extends Component
{
    use WithCrudOperations;
    use WithPagination;
    use WithTableOperations;

    public $name;

    public $FieldName;

    public $Modelo;

    public function hydrate(): void
    {
        $this->permissionModel = 'characteristic';
        $this->model = 'App\Models\Characteristic';
        $this->exportable = 'App\Exports\CharacteristicsExport';
    }

    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $characteristics = new Characteristic;

        $characteristics = $characteristics->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)->paginate(10);

        return view('livewire.characteristics.index', compact('characteristics'));
    }

    /**
     * Reglas de validación para los campos del formulario
     */
    protected function rules(): array
    {
        return [
            'name' => 'required|min:3|max:100',
            'FieldName' => 'required',
            'Modelo' => 'required',
        ];
    }

    /**
     * Almacena un nuevo registro en la base de datos
     */
    public function store()
    {
        can('characteristic create');

        $validate = $this->validate();

        Characteristic::create($validate);

        // reinicamos los campos
        $this->cancel();
        $this->dispatch('alert', ['type' => 'success', 'message' => 'Característica creada correctamente.']);
    }

    /**
     * returns the values ​​of the characteristics to edit
     *
     * @return void
     */
    public function edit()
    {
        can('characteristic update');

        $record = Characteristic::findOrFail($this->selected_id);

        $this->name = $record->name;
        $this->FieldName = $record->FieldName;
        $this->Modelo = $record->Modelo;

        $this->show = true;
    }

    public function update()
    {
        can('characteristic update');

        $validate = $this->validate();

        if ($this->selected_id) {
            $record = Characteristic::find($this->selected_id);
            $record->update($validate);

            $this->resetInput();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Característica actualizada correctamente.']);
        }
    }

    public function duplicate()
    {
        can('characteristic create');

        if ($this->selected_id) {
            $record = Characteristic::find($this->selected_id);
            $newRecord = $record->replicate();
            $newRecord->name = $record->name.' (Copia)';
            $newRecord->save();

            $this->dispatch('alert', ['type' => 'success', 'message' => 'Característica duplicada correctamente.']);
        }
    }
}
