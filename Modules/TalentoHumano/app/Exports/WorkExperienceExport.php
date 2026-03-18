<?php

namespace Modules\TalentoHumano\App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\TalentoHumano\App\Models\FamilyGroup;
use Modules\TalentoHumano\App\Models\WorkExperience;

class WorkExperienceExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    use Exportable;

    private $workExperiences;

    /**
     * Constructor to accept work experiences data
     */
    public function __construct($workExperiences = null)
    {
        $this->workExperiences = $workExperiences;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection(): mixed
    {
        return $this->workExperiences ?: WorkExperience::select([
            'company', 'nature', 'position', 'immediate_supervisor', 'start_date', 'end_date', 'time_service', 'city', 
            'phone', 'contract_type', 'salary', 'main_duties', 'reason_for_leaving'
            ])->get();
    }

    /**
     * devolvemos los encabezados de la tabla
     */
    public function headings(): array
    {
        return [
            'Empresa', 'Naturaleza', 'Cargo', 'Supervisor Inmediato', 'Fecha Inicio', 'Fecha Final', 'Tiempo de Servicio', 'Ciudad', 
            'Teléfono', 'Tipo de Contrato', 'Salario', 'Principales Funciones', 'Motivo para Salir'
        ];
    }
}
