<?php

namespace Modules\TalentoHumano\App\Exports;

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
            'identification', 'full_name', 'hiring_date', 'format', 'observations', 'status', 'period', 'year'
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
            'Formato', 
            'Observaciones', 
            'Estado', 
            'Período', 
            'Año'
        ];
    }
}
