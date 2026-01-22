<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CharacteristicDetailsExport implements FromQuery, WithHeadings
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function query()
    {
        return $this->query;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Característica',
            'Nombre',
            'Abreviatura',
            'Código',
            'Valor',
            'Porcentaje',
            'Máximo',
            'Mínimo',
            'Detener',
            'Estado',
            'Creado',
            'Actualizado',
        ];
    }
}
