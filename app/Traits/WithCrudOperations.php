<?php

namespace App\Traits;

use Livewire\Attributes\On;

trait WithCrudOperations
{
    /**
     * Controla la visibilidad del modal
     */
    public $show = false;

    /**
     * Identificador del registro seleccionado (para editar o eliminar)
     */
    public $selected_id = 0;

    /**
     * Nombre del modelo asociado a la tabla
     */
    public $model;

    /**
     * Determine the method to call: store or update.
     */
    function method()
    {
        return $this->selected_id ? $this->update() : $this->store();
    }

    /**
     * Muestra u oculta el modal
     */
    public function showModal(bool $show = true):void
    {
        $this->show = $show;
    }

    /**
     * Cancela la operación actual y reinicia los campos del formulario
     */
    public function cancel(): void
    {
        $this->resetInput();
    }
    
    /**
     * Cierra el modal y reinicia los campos del formulario
     */
    public function closed(): void
    {
        $this->cancel();
        $this->show = false;
    }

    /**
     * Reinicia los campos del formulario y los errores de validación
     */
    private function resetInput(): void
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->resetExcept(['model', 'exportable', 'keyWord']);
    }

    /**
     * Cambia el estado del registro seleccionado
     */
    #[On('toggleItem')] //escuchamos el evento emitido desde el componente button-toggle
    public function toggleItem()
    {
        // can($this->permissionModel . ' toggle');

        if (count($this->selectedModel)) {
            //consultamos todos los status y consultamos los modelos de los item seleccionadoa
            $status = $this->model::whereIn('id', $this->selectedModel)->get('status')->toArray();
            $record = $this->model::whereIn('id', $this->selectedModel);

            if(!$status || $status[0]['status'] == 'Completed'){
                $this->resetInput();
                return $this->dispatch('alert', ['type' => 'warning', 'message' => 'Item Anulado o No se encuentra en estado activo no se puede cambiar']);
            };

            if($status[0]['status']) {

                $record->update([ 'status' => false ]); //actualizamos los modelos

                $this->selectedModel = []; //limpiamos todos los item seleccionados
                $this->selectAll = false;
                return $this->dispatch('alert', ['type' => 'sucess', 'message' => 'Item Inactivo']);

            } else {

                $record->update([ 'status' => true ]);
                $this->selectedModel = [];
                $this->selectAll = false;
                return $this->dispatch('alert', ['type' => 'sucess', 'message' => 'Item Activo']);
            }

            if($status[0]['status'] === 'Open' && $status[0]['status'] <> 'Completed') {

                $record->update([ 'status' => 'Blocked' ]); //actualizamos los modelos

                $this->selectedModel = []; //limpiamos todos los item seleccionados
                $this->selectAll = false;
            } else {

                $record->update([ 'status' => 'Open' ]);
                $this->selectedModel = [];
                $this->selectAll = false;
            }
        } else {
            $this->dispatch('alert', ['type' => 'warning', 'message' => 'Selecciona un Item']);
        }
    }
}
