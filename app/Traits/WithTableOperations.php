<?php

namespace App\Traits;

trait WithTableOperations
{
    /**
     * Tema de paginación (bootstrap o tailwind)
     */
    protected $paginationTheme = 'bootstrap';

    /**
     * Indica si las acciones masivas están deshabilitadas
     */
    public $bulkDisabled = true;

    /**
     * IDs de los registros seleccionados en la tabla
     */
    public $selectedModel = [];

    /**
     * Controla el checkbox "seleccionar todo"
     */
    public $selectAll = false;

    /** 
     * Variables para el ordenamiento de la tabla
     */
    public $sortField = 'id';
    
    /**
     * Determine la dirección del ordenamiento: asc o desc.
     */
    public $sortDirection = 'desc';

    /**
     * Término de búsqueda para filtrar registros
     */
    public $keyWord;

    /**
     * Handle the "select all" checkbox update.
     */
    public function updatedSelectAll($value): void
    {
        $value ? $this->selectedModel = $this->model::pluck('id') : $this->selectedModel = [];
    }

    /**
     * Ordena la tabla por el campo especificado.
     *
     * @param string $field El campo por el cual ordenar.
     */
    public function sortBy($field): void
    {
        $this->sortDirection = $this->sortField === $field
        ? $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc'
        : 'asc';

        $this->sortField = $field;
    }

    /**
     * Resetea la paginación al actualizar el término de búsqueda.
     */
    public function updatingKeyWord(): void
    {
        $this->resetPage();
    }
}
