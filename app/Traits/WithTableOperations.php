<?php

namespace App\Traits;

use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;

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

    /** Atributo asignado para exportar datos */
    public $exportable;

    /** Atributo asignado para auditoria de modelos */
    public $audit = [];

    /** Controla la visibilidad del modal de auditoria */
    public $showauditor = false;

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
     * @param  string  $field  El campo por el cual ordenar.
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

        $query = $query->QueryExport($this->keyWord, $this->sortField, $this->sortDirection)->get();

        return Excel::download(new $this->exportable($query), 'filename.'.$ext);
    }

    /**
     * devolvemos el modal de auditoria con los datos del registro seleccionado
     */
    public function auditoria(): void
    {
        // validamos que el registro este seleccionado
        if ($this->selected_id) {
            // consultamos el registro seleccionado y cargamos los datos de la auditoria
            $this->audit = $this->model::with(['creator', 'editor'])->find($this->selected_id)->toArray();

            $this->showauditor = true;
        } else {
            $this->dispatch('alert', ['type' => 'warning', 'message' => 'Selecciona un registros']);
        }
    }

    /**
     * cerramos el modal de auditoria
     *
     * @return void
     */
    public function showaudit()
    {
        $this->showauditor = false;
    }
}
