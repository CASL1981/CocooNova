<?php

namespace App\Exports;

use App\Models\Destination;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DestinationsExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    use Exportable;

    private $destinations;

    /**
     * Constructor to accept destinations data
     */
    public function __construct($destinations = null)
    {
        $this->destinations = $destinations;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection(): mixed
    {
        return $this->destinations ?: Destination::select('costcenter', 'name', 'address', 'phone', 'location', 'minimun', 'maximun', 'status')->get();
    }

    /**
     * devolvemos los encabezados de la tabla
     */
    public function headings(): array
    {
        return [
            'Centro Costo',
            'Descripción',
            'Dirección',
            'Teléfono',
            'Ubicación',
            'Mínimo',
            'Máximo',
            'Estado',
        ];
    }
}
