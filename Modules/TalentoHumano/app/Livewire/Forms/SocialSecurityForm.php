<?php

namespace Modules\TalentoHumano\App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Modules\TalentoHumano\App\Enums\ContractType;
use Modules\TalentoHumano\App\Models\SocialSecurity;

class SocialSecurityForm extends Form
{
    public ?SocialSecurity $socialSecurity = null;

    #[Validate('required')]
    public ?int $contract_id = null;
    
    #[Validate('nullable|string|max:100')]
    public string $position = '';
    
    #[Validate('nullable|string|max:100')]
    public string $work_location = '';
    
    #[Validate('nullable|string|max:100')]
    public string $contract_type = '';

    #[Validate('nullable|numeric|min:0')]
    public ?float $salary = null;

    #[Validate('nullable|date')]
    public ?string $start_date = null;

    #[Validate('nullable|date|after_or_equal:start_date')]
    public ?string $end_date = null;
    
    #[Validate('nullable|string|max:100')]
    public string $eps = '';

    #[Validate('nullable|string|max:100')]
    public string $afp = '';

    #[Validate('nullable|string|max:100')]
    public string $risk = '';

    #[Validate('nullable|string|max:100')]
    public string $work_shift = '';

    // ---- Validation attributes in Spanish ----

    public function validationAttributes(): array
    {
        return [
            'position'             => 'cargo',
            'work_location'        => 'lugar de trabajo',
            'contract_type'        => 'tipo de contrato',
            'salary'               => 'salario',
            'start_date'           => 'fecha de inicio',
            'end_date'             => 'fecha de fin',            
            'eps'                  => 'EPS',
            'afp'                  => 'AFP',
            'risk'                 => 'riesgo',
            'work_shift'           => 'turno de trabajo',
        ];
    }

    // ---- Fill form for edit mode ----

    public function setSocialSecurity(Int $Id): void
    {
        $socialSecurity = SocialSecurity::findOrFail($Id);

        $this->position              = $socialSecurity->position ?? 'null';
        $this->work_location        = $socialSecurity->work_location ?? 'null';
        $this->contract_type         = $socialSecurity->contract_type instanceof ContractType ? $socialSecurity->contract_type->value : $socialSecurity->contract_type;
        $this->salary                = $socialSecurity->salary;
        $this->start_date            = optional($socialSecurity->start_date)->format('Y-m-d');
        $this->end_date              = optional($socialSecurity->end_date)->format('Y-m-d');
        $this->eps                   = $socialSecurity->eps;
        $this->afp                   = $socialSecurity->afp;
        $this->risk                  = $socialSecurity->risk;
        $this->work_shift            = $socialSecurity->work_shift;
    }

    // ---- Store ----

    public function store(): SocialSecurity
    {
        $socialSecurity = SocialSecurity::create(
            $this->only([
                'contract_id', 'position', 'work_location', 'contract_type', 'salary', 'start_date', 'end_date',
                'eps', 'afp', 'risk', 'work_shift'
            ])
        );

        return $socialSecurity;
    }

    // ---- Update ----

    public function update(): SocialSecurity
    {
        $this->validate();

        $this->socialSecurity->update(
            $this->only([
                'contract_id', 'position', 'work_location', 'contract_type', 'salary', 'start_date', 'end_date',
                'eps', 'afp', 'risk', 'work_shift'
            ])
        );

        return $this->socialSecurity;
    }

    // ---- Reset preserving employee data ----

    public function resetPreservingContract(): void
    {
        $contractId = $this->contract_id;

        $this->reset();

        $this->contract_id       = $contractId;
    }
}