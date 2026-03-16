<?php

namespace Modules\TalentoHumano\App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\TalentoHumano\App\Models\FamilyGroup;

class FamilyGroupExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    use Exportable;

    private $familygroups;

    /**
     * Constructor to accept family groups data
     */
    public function __construct($familygroups = null)
    {
        $this->familygroups = $familygroups;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection(): mixed
    {
        return $this->familygroups ?: FamilyGroup::select([
            'identification', 'name', 'kinship', 'profession', 'occupation', 'company', 'education_level', 'birth_date',
             'illness', 'phone'
            ])->get();
    }

    /**
     * devolvemos los encabezados de la tabla
     */
    public function headings(): array
    {
        return [
            'Identificación', 'Nombre', 'Parentesco', 'Profesión', 'Ocupación', 'Empresa', 'Nivel Educativo', 'Fecha Nacimiento', 
            'Enfermedades', 'Teléfono'
        ];
    }
}
