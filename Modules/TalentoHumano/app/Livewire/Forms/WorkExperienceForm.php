<?php

namespace Modules\TalentoHumano\App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Modules\TalentoHumano\App\Models\WorkExperience;

class WorkExperienceForm extends Form
{
    public ?WorkExperience $workExperience = null;

    #[Validate('nullable')]
    public ?int $employee_id = null;

    #[Validate('required|string|max:200')]
    public string $company = '';

    #[Validate('nullable|string|max:150')]
    public string $nature = '';

    #[Validate('required|string|max:150')]
    public string $position = '';

    #[Validate('nullable|string|max:150')]
    public string $immediate_supervisor = '';

    #[Validate('required|date')]
    public ?string $start_date = null;

    #[Validate('nullable|date|after_or_equal:start_date')]
    public ?string $end_date = null;

    #[Validate('nullable|string|max:50')]
    public string $time_service = '';

    #[Validate('nullable|string|max:100')]
    public string $city = '';

    #[Validate('nullable|string|max:30')]
    public string $phone = '';

    #[Validate('nullable|string|max:100')]
    public string $contract_type = '';

    #[Validate('nullable|numeric|min:0')]
    public ?float $salary = null;

    #[Validate('nullable|string')]
    public string $main_duties = '';

    #[Validate('nullable|string')]
    public string $reason_for_leaving = '';

    // ---- Validation attributes in Spanish ----

    public function validationAttributes(): array
    {
        return [
            'company'              => 'empresa',
            'nature'               => 'naturaleza',
            'position'             => 'cargo',
            'immediate_supervisor' => 'jefe inmediato',
            'start_date'           => 'fecha de inicio',
            'end_date'             => 'fecha de fin',
            'time_service'         => 'tiempo de servicio',
            'city'                 => 'ciudad',
            'phone'                => 'teléfono',
            'contract_type'        => 'tipo de contrato',
            'salary'               => 'salario',
            'main_duties'          => 'funciones principales',
            'reason_for_leaving'   => 'motivo de retiro',
        ];
    }

    // ---- Fill form for edit mode ----

    public function setWorkExperience(Int $Id): void
    {
        $workExperience = WorkExperience::findOrFail($Id);

        $this->workExperience        = $workExperience;
        $this->employee_id           = $workExperience->employee_id;
        $this->company               = $workExperience->company ?? 'null';
        $this->nature                = $workExperience->nature ?? '';
        $this->position              = $workExperience->position ?? 'null';
        $this->immediate_supervisor  = $workExperience->immediate_supervisor ?? '';
        $this->start_date            = optional($workExperience->start_date)->format('Y-m-d');
        $this->end_date              = optional($workExperience->end_date)->format('Y-m-d');
        $this->time_service          = $workExperience->time_service ?? '';
        $this->city                  = $workExperience->city ?? '';
        $this->phone                 = $workExperience->phone ?? '';
        $this->contract_type         = $workExperience->contract_type ?? '';
        $this->salary                = $workExperience->salary;
        $this->main_duties           = $workExperience->main_duties ?? '';
        $this->reason_for_leaving    = $workExperience->reason_for_leaving ?? '';
    }

    // ---- Store ----

    public function store(): WorkExperience
    {
        $workExperience = WorkExperience::create(
            $this->only([
                'employee_id', 'company', 'nature', 'position',
                'immediate_supervisor', 'start_date', 'end_date',
                'time_service', 'city', 'phone', 'contract_type',
                'salary', 'main_duties', 'reason_for_leaving',
            ])
        );

        return $workExperience;
    }

    // ---- Update ----

    public function update(): WorkExperience
    {
        $this->validate();

        $this->workExperience->update(
            $this->only([
                'employee_id', 'company', 'nature', 'position',
                'immediate_supervisor', 'start_date', 'end_date',
                'time_service', 'city', 'phone', 'contract_type',
                'salary', 'main_duties', 'reason_for_leaving',
            ])
        );

        return $this->workExperience;
    }

    // ---- Reset preserving employee data ----

    public function resetPreservingEmployee(): void
    {
        $employeeId       = $this->employee_id;

        $this->reset();

        $this->employee_id       = $employeeId;
    }
}
