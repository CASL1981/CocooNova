<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Spatie\Permission\Models\Role;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RolesExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    use Exportable;

    private $roles;

    /**
     * Constructor to accept roles data
     */
    public function __construct($roles = null)
    {
        $this->roles = $roles;
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->roles ?: Role::select('name')->get();
    }

    /**
     * devolvemos los encabezados de la tabla
     * @return array
     */
    public function headings(): array
    {
        return [
            'Descripción',
        ];
    }
}
