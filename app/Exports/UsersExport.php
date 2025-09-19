<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    use Exportable;

    private $users;

    /**
     * Constructor to accept users data
     */
    public function __construct($users = null)
    {
        $this->users = $users;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(): mixed
    {
        return $this->users ?: User::select('identification', 'name', 'lastname', 'email', 'status', 'destination')->get();
    }

    /**
     * devolvemos los encabezados de la tabla
     * @return array
     */
    public function headings(): array
    {
        return [
            'Identificación',
            'Nombre',
            'Apelliido',
            'email',
            'Estado',
            'Centro Costo',
        ];
    }
}
