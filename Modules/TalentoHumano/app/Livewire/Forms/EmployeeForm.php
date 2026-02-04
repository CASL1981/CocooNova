<?php

namespace Modules\Talentohumano\App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;

class EmployeeForm extends Form
{
    // ID del registro (necesario para validaciones unique al editar)
    public ?int $id = null;

    // --- Identificación y Nombres ---
    
    #[Validate('required|string|in:CC,TI,CE,RC,PAS')]
    public $type_document = '';

    #[Validate('required|integer|digits_between:7,10')]
    public $identification = '';

    #[Validate('required|string|max:100')]
    public $first_name = '';

    #[Validate('required|string|max:100')]
    public $last_name = '';

    #[Validate('nullable|string|max:100')]
    public $expedition_department = '';

    #[Validate('nullable|string|max:100')]
    public $expedition_city = '';
    
    // --- Ubicación y contacto ---

    #[Validate('required|email|max:100')] 
    public $email = '';
    
    #[Validate('required|string|max:50')]
    public $type_housing = '';

    #[Validate('required|string|max:250')]
    public $address = '';

    #[Validate('required|string|max:20')]
    public $cel_phone = '';

    #[Validate('required|string|max:20')]
    public $cel_phone2 = '';

    #[Validate('required|string|max:100')]
    public $department = '';

    #[Validate('required|string|max:100')]
    public $city = '';

    #[Validate('required|integer|digits_between:1,7')]
    public $estrato = '';
    
    // --- Datos Demográficos ---

    #[Validate('required|string|max:20')]
    public $gender = '';

    #[Validate('required|date')]
    public $birth_date = '';
    
    #[Validate('required|string|max:100')]
    public $department_birth = '';

    #[Validate('required|string|max:100')]
    public $city_birth = '';

    #[Validate('required|string|max:10')]
    public $blood_type = '';

    #[Validate('required|string|max:20')]
    public $marital_status = '';

    #[Validate('required|integer|min:0|max:10')]
    public $number_children = 0;

    // --- Información Militar ---

    #[Validate('nullable|string|max:20')]
    public $military_service = '';

    #[Validate('nullable|string|max:20')]
    public $type_militart = '';

    #[Validate('nullable|string|max:50')]
    public $district = '';

    // --- Información Laboral ---

    #[Validate('required|string|max:100')]
    public $position = '';

    #[Validate('required|string|max:100')]
    public $area = '';

    #[Validate('required|exists:destinations,id')]
    public $destination_id = '';

    #[Validate('boolean')]
    public $vendedor = false;
    
    #[Validate('boolean')]
    public $auditor = false;

    #[Validate('boolean')]
    public $approve = false;
    
    // --- Foto ---
    
    #[Validate('nullable|string')]
    public $photo_path = '';

    /**
     * IMPORTANTE: Para las reglas 'unique' que requieren ignorar el ID actual (edición),
     * los atributos #[Validate] estáticos tienen limitaciones ya que no pueden acceder a $this->id 
     * en el momento de la definición.
     * 
     * Livewire recomienda un enfoque híbrido o usar el método rules() solo para estas excepciones complejas.
     * Sin embargo, si deseas usar validación al guardar en tu componente, puedes pasar reglas dinámicas
     * al método validate().
     * 
     * Si decides mantenerlo 100% en el Form Object, debes sobreescribir rules() SOLO para estos campos
     * y Livewire fusionará las reglas de los atributos con las de este método.
     */
    public function rules()
    {
        return [
            'identification' => [
                Rule::unique('employees', 'identification')->ignore($this->id),
            ],
            'email' => [
                Rule::unique('employees', 'email')->ignore($this->id),
            ],
        ];
    }

    /**
     * Nombres de atributos personalizados en español.
     */
    public function validationAttributes(): array
    {
        return [
            'identification' => 'número de identificación',
            'first_name' => 'nombres',
            'last_name' => 'apellidos',
            'type_document' => 'tipo de documento',
            'address' => 'dirección de residencia',
            'phone' => 'teléfono fijo',
            'cel_phone' => 'celular principal',
            'cel_phone2' => 'celular secundario',
            'email' => 'correo electrónico',
            'gender' => 'género',
            'birth_date' => 'fecha de nacimiento',
            'expedition_department' => 'departamento de expedición',
            'expedition_city' => 'ciudad de expedición',
            'military_service' => 'número de libreta militar',
            'type_militart' => 'tipo de libreta',
            'district' => 'distrito militar',
            'department' => 'departamento de residencia',
            'city' => 'ciudad de residencia',
            'estrato' => 'estrato socioeconómico',
            'type_housing' => 'tipo de vivienda',
            'number_children' => 'número de hijos',
            'department_birth' => 'departamento de nacimiento',
            'city_birth' => 'ciudad de nacimiento',
            'blood_type' => 'tipo de sangre',
            'marital_status' => 'estado civil',
            'position' => 'cargo',
            'area' => 'área',
            'destination_id' => 'destino/sucursal',
            'photo_path' => 'foto',
            'vendedor' => 'vendedor',
            'status' => 'estado',
            'auditor' => 'auditor',
            'approve' => 'aprobado',
        ];
    }
}
