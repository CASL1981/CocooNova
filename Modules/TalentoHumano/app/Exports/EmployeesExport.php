<?php

namespace Modules\TalentoHumano\App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\TalentoHumano\App\Models\Employee;

class EmployeesExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    use Exportable;

    private $employees;

    /**
     * Constructor to accept employees data
     */
    public function __construct($employees = null)
    {
        $this->employees = $employees;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection(): mixed
    {
        return $this->employees ?: Employee::select([
            'type_document', 'identification', 'expedition_department', 'expedition_city', 'first_name', 'last_name',
            'military_service', 'type_militart', 'district', 'department', 'city', 'address', 'estrato', 'type_housing', 'number_children',
            'cel_phone', 'cel_phone2', 'email', 'gender', 'birth_date', 'department_birth', 'city_birth', 'destination_id',
            'photo_path', 'blood_type', 'marital_status', 'position', 'area', 'vendedor', 'status', 'auditor', 'approve'
            ])->get();
    }

    /**
     * devolvemos los encabezados de la tabla
     */
    public function headings(): array
    {
        return [
            'Tipo Documento', 'Identificación', 'Departamento Expedición', 'Ciudad Expedición', 'Nombres', 'Apellidos',
            'Servicio Militar', 'Tipo Militar', 'Distrito', 'Departamento', 'Ciudad', 'Dirección', 'Estrato', 'Tipo Vivienda', 'Número Hijos',
            'Celular 1', 'Celular 2', 'Email', 'Género', 'Fecha Nacimiento', 'Departamento Nacimiento', 'Ciudad Nacimiento', 'Destino',
            'Foto Ruta', 'Tipo Sangre', 'Estado Civil', 'Cargo','Área','Vendedor','Estado','Auditor','Aprobado'
        ];
    }
}
