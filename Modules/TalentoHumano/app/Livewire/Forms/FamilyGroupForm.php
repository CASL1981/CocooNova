<?php

namespace Modules\Talentohumano\App\Livewire\Forms;

use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FamilyGroupForm extends Form
{
    // ID del registro (necesario para validaciones unique al editar)
    public ?int $id = null;

    #[Validate('required|exists:humantalent_employees,id')]
    public int $employee_id;

    public string $name = '';

    public string $identification = '';

    #[Validate('required|string|max:100')]
    public string $kinship = '';

    #[Validate('nullable|string|max:150')]
    public string $profession = '';

    #[Validate('nullable|string|max:150')]
    public string $occupation = '';

    #[Validate('nullable|string|max:150')]
    public string $company = '';

    #[Validate('nullable|string|max:100')]
    public string $education_level = '';

    #[Validate('required|date')]
    public ?string $birth_date = null;

    #[Validate('nullable|string|max:255')]
    public string $illness = '';

    #[Validate('nullable|string|max:20')]
    public string $phone = '';

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
    public function rules(): array
    {
        return [
            'identification' => [
                'required',
                'string',
                'max:10',
                Rule::unique('humantalent_family_groups', 'identification')
                    ->where('employee_id', $this->employee_id)
                    ->ignore($this->id, 'id'),
            ],
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('humantalent_family_groups', 'name')
                    ->where('employee_id', $this->employee_id)
                    ->ignore($this->id, 'id'),
            ],
        ];
    }

    /**
     * Nombres de atributos personalizados en español.
     */
    public function validationAttributes(): array
    {
        return [
            'form.employee_id' => 'empleado',
            'form.name' => 'nombre del familiar',
            'form.identification' => 'identificación',
            'form.kinship' => 'parentesco',
            'form.profession' => 'profesión',
            'form.occupation' => 'ocupación',
            'form.company' => 'empresa',
            'form.education_level' => 'nivel educativo',
            'form.birth_date' => 'fecha de nacimiento',
            'form.illness' => 'enfermedad',
            'form.phone' => 'teléfono',
        ];
    }

    /**
     * Guarda un nuevo registro en la base de datos
     */
    public function store()
    {
        \Modules\TalentoHumano\App\Models\FamilyGroup::create($this->all());
    }
}
