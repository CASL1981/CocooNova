<?php

namespace App\Livewire;

use App\Models\Destination;
use App\Traits\WithCrudOperations;
use App\Traits\WithTableOperations;
use Livewire\Component;
use Livewire\WithPagination;

class Destinations extends Component
{
    use WithPagination;
    use WithCrudOperations;
    use WithTableOperations;

    public $costcenter, $name, $address, $phone, $location, $minimun, $maximun, $status;

    public function hydrate(): void
    {
        $this->permissionModel = 'destination';
        $this->model = 'App\Models\Destination';
        $this->exportable ='App\Exports\DestinationsExport';

    }

    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $destinations = new Destination();

        $destinations = $destinations->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)->paginate(10);
        
        return view('livewire.destination.index', compact('destinations'));
    }

    /**
     * Reglas de validación para los campos del formulario
     */
    protected function rules(): array
    {
        return [
            'costcenter' => 'required',
            'name' => 'required|min:3|max:100',
            'address' => 'nullable',
            'phone' => 'nullable',
            'location' => 'nullable',
            'minimun' => 'nullable|numeric',
            'maximun' => 'nullable|numeric',
            'status' => 'required',
        ];
    }

    /**
     * Almacena un nuevo registro en la base de datos
     */
    public function store()
    {     
        can('destination create');
        
        $validate = $this->validate();

        Destination::create($validate);

        //reinicamos los campos
        $this->cancel();
    	$this->dispatch('alert', ['type' => 'success', 'message' => 'Centro de costo creado correctamente.']);
    }


    /**
     * returns the values ​​of the destinations to edit
     * @return void
     */
    public function edit()
    {
        can('destination update');

        $record = Destination::findOrFail($this->selected_id);

        $this->costcenter = $record->costcenter;
        $this->name = $record->name;
        $this->address = $record->address;
        $this->phone = $record->phone;
        $this->location = $record->location;
        $this->minimun = $record->minimun;
        $this->maximun = $record->maximun;
        $this->status = $record->status;

        $this->show = true;
    }

    public function update()
    {
        can('destination update');
        
        $validate = $this->validate();
        
        if ($this->selected_id) {
            $record = Destination::find($this->selected_id);
            $record->update($validate);
            
            $this->resetInput();
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Centro de costo actualizado correctamente.']);
        }
    }

    public function duplicate()
    {
        can('destination create');
        
        if ($this->selected_id) {
            $record = Destination::find($this->selected_id);
            $newRecord = $record->replicate();
            $newRecord->name = $record->name . ' (Copia)';
            $newRecord->save();
            
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Centro de costo duplicado correctamente.']);
        }
    }
}
