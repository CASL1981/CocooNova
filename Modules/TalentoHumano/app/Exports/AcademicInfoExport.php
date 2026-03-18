<?php

namespace Modules\TalentoHumano\App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\TalentoHumano\App\Models\WorkExperience;

class AcademicInfoExport implements FromCollection, ShouldAutoSize, WithHeadings
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
            'academic_modality', 'graduate', 'degree_obtained', 'educational_institution', 'duration', 'completion_date', 'professional_license'
            ])->get();
    }

    /**
     * devolvemos los encabezados de la tabla
     */
    public function headings(): array
    {
        return [
            'Modalidad Académica', 'Graduado', 'Título Obtenido', 'Institución Educativa', 'Duración', 'Fecha de Finalización', 'Licencia Profesional'
        ];
    }
}
