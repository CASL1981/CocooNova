<?php

namespace Modules\TalentoHumano\App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use Modules\TalentoHumano\App\Models\AcademicInfo;

class AcademicInfoForm extends Form
{
    public ?AcademicInfo $academicInfo = null;

    #[Validate('nullable')]
    public ?int $employee_id = null;

    #[Validate('nullable|string|max:100')]
    public string $academic_modality = '';

    #[Validate('boolean')]
    public bool $graduate = false;

    #[Validate('nullable|string|max:200')]
    public string $degree_obtained = '';

    #[Validate('nullable|string|max:200')]
    public string $educational_institution = '';

    #[Validate('nullable|string|max:50')]
    public string $duration = '';

    #[Validate('nullable|date')]
    public ?string $completion_date = null;

    #[Validate('nullable|string|max:100')]
    public string $professional_license = '';

    // ---- Validation attributes in Spanish ----

    protected function validationAttributes(): array
    {
        return [
            'academic_modality'       => 'modalidad académica',
            'graduate'                => 'graduado',
            'degree_obtained'         => 'título obtenido',
            'educational_institution' => 'institución educativa',
            'duration'                => 'duración',
            'completion_date'         => 'fecha de finalización',
            'professional_license'    => 'tarjeta profesional',
        ];
    }

    // ---- Fill form for edit mode ----

    public function setAcademicInfo(int $id): void
    {
        $academicInfo = AcademicInfo::findOrFail($id);

        $this->academicInfo             = $academicInfo;
        $this->employee_id              = $academicInfo->employee_id;
        $this->academic_modality        = $academicInfo->academic_modality ?? '';
        $this->graduate                 = (bool) $academicInfo->graduate;
        $this->degree_obtained          = $academicInfo->degree_obtained ?? '';
        $this->educational_institution  = $academicInfo->educational_institution ?? '';
        $this->duration                 = $academicInfo->duration ?? '';
        $this->completion_date          = optional($academicInfo->completion_date)->format('Y-m-d');
        $this->professional_license     = $academicInfo->professional_license ?? '';
    }

    // ---- Store ----

    public function store(): AcademicInfo
    {
        return AcademicInfo::create(
            $this->only([
                'employee_id',
                'academic_modality',
                'graduate',
                'degree_obtained',
                'educational_institution',
                'duration',
                'completion_date',
                'professional_license',
            ])
        );
    }
}
