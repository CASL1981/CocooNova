<?php

namespace Modules\TalentoHumano\App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\TalentoHumano\App\Models\Evaluation;

class EvaluationExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    use Exportable;

    private $evaluations;

    /**
     * Constructor to accept work experiences data
     */
    public function __construct($evaluations = null)
    {
        $this->evaluations = $evaluations;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection(): mixed
    {
        return $this->evaluations ?: Evaluation::select([
            'type', 'start_date', 'end_date', 'date', 'result', 'interpretation'
            ])->get();
    }

    /**
     * devolvemos los encabezados de la tabla
     */
    public function headings(): array
    {
        return [
            'Tipo', 'Fecha de Inicio', 'Fecha de Fin', 'Fecha', 'Resultado', 'Interpretación'
        ];
    }
}
