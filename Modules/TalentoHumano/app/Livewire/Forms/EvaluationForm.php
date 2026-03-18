<?php

namespace Modules\TalentoHumano\App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use Modules\TalentoHumano\App\Models\Evaluation;

class EvaluationForm extends Form
{
    public ?Evaluation $evaluation = null;

    #[Validate('nullable')]
    public ?int $employee_id = null;

    #[Validate('required|string|in:Anual,Periodica,Proceso')]
    public string $type = '';

    #[Validate('required|date')]
    public ?string $start_date = null;

    #[Validate('required|date|after_or_equal:start_date')]
    public ?string $end_date = null;

    #[Validate('required|date')]
    public ?string $date = null;

    #[Validate('required|numeric|min:1|max:5|decimal:0,1')]
    public ?float $result = null;

    #[Validate('nullable|string|max:200')]
    public string $interpretation = '';

    // ---- Validation attributes in Spanish ----

    protected function validationAttributes(): array
    {
        return [
            'type'           => 'tipo de evaluación',
            'start_date'     => 'fecha de inicio',
            'end_date'       => 'fecha de fin',
            'date'           => 'fecha',
            'result'         => 'resultado',
            'interpretation' => 'interpretación',
        ];
    }

    // ---- Fill form for edit mode ----

    public function setEvaluation(int $id): void
    {
        $evaluation = Evaluation::findOrFail($id);

        $this->evaluation      = $evaluation;
        $this->employee_id     = $evaluation->employee_id;
        $this->type            = $evaluation->type;
        $this->start_date      = optional($evaluation->start_date)->format('Y-m-d');
        $this->end_date        = optional($evaluation->end_date)->format('Y-m-d');
        $this->date            = optional($evaluation->date)->format('Y-m-d');
        $this->result          = $evaluation->result;
        $this->interpretation  = $evaluation->interpretation ?? '';
    }

    // ---- Store ----

    public function store(): Evaluation
    {
        return Evaluation::create(
            $this->only([
                'employee_id',
                'type',
                'start_date',
                'end_date',
                'date',
                'result',
                'interpretation',
            ])
        );
    }
}
