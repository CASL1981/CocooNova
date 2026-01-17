<?php

namespace App\Exports;

use App\Models\Characteristic;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CharacteristicsExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    use Exportable;

    private $characteristics;

    /**
     * Constructor to accept characteristics data
     */
    public function __construct($characteristics = null)
    {
        $this->characteristics = $characteristics;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection(): mixed
    {
        return $this->characteristics ?: Characteristic::select(['name', 'FieldName', 'Modelo'])->get();
    }

    /**
     * devolvemos los encabezados de la tabla
     */
    public function headings(): array
    {
        return [
            'Nombre',
            'Campo',
            'Modelo',
        ];
    }
}
