<?php

namespace Modules\TalentoHumano\app\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\TalentoHumano\App\Models\Contract;
use Modules\TalentoHumano\App\Models\WorkExperience;

class ContractExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    use Exportable;

    private $contracts;

    /**
     * Constructor to accept contract data
     */
    public function __construct($contracts = null)
    {
        $this->contracts = $contracts;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection(): mixed
    {
        return $this->contracts ?: Contract::select([
            'identification', 'full_name', 'hiring_date', 'termination_date', 'format', 'observations',
            'city', 'type', 'probationary_period', 'salary', 'work_schedule', 'status', 'period', 'year',
            'reason_leaving', 'destination'
            ])->get();
    }

    /**
     * devolvemos los encabezados de la tabla
     */
    public function headings(): array
    {
        return [
            'Identificación', 
            'Nombre Completo', 
            'Fecha de Contratación', 
            'Fecha de Terminación',
            'Formato', 
            'Observaciones',
            'Ciudad', 
            'Tipo',
            'Período de Prueba',
            'Salario',
            'Horario de Trabajo',
            'Estado', 
            'Período', 
            'Año',
            'Motivo de Salida',
            'Centro Costos'
        ];
    }
}
