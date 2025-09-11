<?php

namespace App\Traits;

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

}
