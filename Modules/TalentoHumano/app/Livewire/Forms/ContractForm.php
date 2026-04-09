<?php

namespace Modules\Talentohumano\App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Modules\TalentoHumano\App\Enums\ContractType;
use Modules\TalentoHumano\App\Models\Contract;

class ContractForm extends Form
{
    // ID del registro (necesario para validaciones unique al editar)
    public ?int $id = null;

    // --- Identificación y Nombres ---

    #[Validate('nullable')]
    public ?int $employee_id = null;

    #[Validate('required|integer|digits_between:7,10')]
    public $identification = '';

    #[Validate('required|string|max:150')]
    public $full_name = '';

    #[Validate('required|date')]
    public $hiring_date = '';

    #[Validate('nullable|date|after_or_equal:hiring_date')]
    public $termination_date = '';

    #[Validate('nullable|string|max:100')]
    public $format = '';

    #[Validate('nullable|string|max:200')]
    public $observations = '';

    #[Validate('nullable|string|max:100')]
    public $city = '';

    #[Validate('nullable|string|max:50')]
    public $type = '';

    #[Validate('required|string|max:100')]
    public $position = '';

    #[Validate('nullable|string|max:100')]
    public $probationary_period = '';

    #[Validate('nullable|numeric|min:0')]
    public $salary = '';

    #[Validate('nullable|string|max:100')]
    public $work_schedule = '';

    #[Validate('nullable|string|max:200')]
    public $reason_leaving = '';

    #[Validate('nullable|string|max:200')]
    public $destination = '';

    #[Validate('nullable|string|max:100')]
    public $job = '';

    #[Validate('boolean')]
    public $status = true;

    #[Validate('required|integer')]
    public $period = '';

    #[Validate('required|integer')]
    public $year = '';
   

    /**
     * Nombres de atributos personalizados en español.
     */
    public function validationAttributes(): array
    {
        return [
            'employee_id' => 'empleado',
            'identification' => 'número de identificación',
            'full_name' => 'nombre completo',
            'hiring_date' => 'fecha de contratación',
            'termination_date' => 'fecha de terminación',
            'format' => 'formato del contrato',
            'observations' => 'observaciones',
            'city' => 'ciudad',
            'type' => 'tipo de contrato',
            'position' => 'cargo',
            'probationary_period' => 'período de prueba',
            'salary' => 'salario',
            'work_schedule' => 'horario de trabajo',
            'reason_leaving' => 'motivo de retiro',
            'destination' => 'Centro de costos o destino',
            'status' => 'estado',
            'period' => 'período',
            'year' => 'año',
            'job' => 'Labor desempeñada',
        ];
    }

    // ---- Fill form for edit mode ----

    public function setContract(int $id): void
    {
        $contract = Contract::findOrFail($id);

        $this->employee_id              = $contract->employee_id;
        $this->identification           = $contract->identification;
        $this->full_name                = $contract->full_name ?? '';
        $this->hiring_date              = $contract->hiring_date->format('Y-m-d');
        $this->termination_date         = $contract->termination_date?->format('Y-m-d');
        $this->format                   = $contract->format instanceof ContractType ? $contract->format->value : $contract->format;;
        $this->observations             = $contract->observations ?? '';
        $this->city                     = $contract->city ?? '';
        $this->type                     = $contract->type ?? '';
        $this->position                 = $contract->position ?? '';
        $this->probationary_period      = $contract->probationary_period ?? '';
        $this->salary                   = $contract->salary;
        $this->work_schedule            = $contract->work_schedule ?? '';
        $this->reason_leaving           = $contract->reason_leaving ?? '';
        $this->destination              = $contract->destination ?? '';
        $this->status                   = $contract->status ?? '';
        $this->period                   = $contract->period ?? '';
        $this->year                     = $contract->year ?? '';
        $this->job                      = $contract->job ?? '';
    }
}
