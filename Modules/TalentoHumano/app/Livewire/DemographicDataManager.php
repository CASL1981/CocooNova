<?php

namespace Modules\Talentohumano\App\Livewire;

use Livewire\Component;
use Modules\TalentoHumano\App\Models\DemographicData;

class DemographicDataManager extends Component
{
    // ---- Propiedades del componente (no se resetean) ----
    public $employeeId;
   
    public $politically_exposed = 0;

    public $public_resources = 0;

    public $special_protection = 0;

    public $elderly_person = 0;

    public $disabled_person = 0;

    public $victims_conflict = 0;

    public $extreme_poverty = 0;

    public $indigenous_person = 0;

    public $afro_population = 0;

    public $diverse_population = 0;

    public $other_protection = 0;
    
    public function mount(int $employeeId): void
    {
        $this->employeeId = $employeeId;

        $demographicData = DemographicData::where('employee_id', $this->employeeId)->first();

        if ($demographicData) {
            $this->politically_exposed = $demographicData->politically_exposed ?? 0;
            $this->public_resources = $demographicData->public_resources ?? 0;
            $this->special_protection = $demographicData->special_protection ?? 0;
            $this->elderly_person = $demographicData->elderly_person ?? 0;
            $this->disabled_person = $demographicData->disabled_person ?? 0;
            $this->victims_conflict = $demographicData->victims_conflict ?? 0;
            $this->extreme_poverty = $demographicData->extreme_poverty ?? 0;
            $this->indigenous_person = $demographicData->indigenous_person ?? 0;
            $this->afro_population = $demographicData->afro_population ?? 0;
            $this->diverse_population = $demographicData->diverse_population ?? 0;
            $this->other_protection = $demographicData->other_protection ?? 0;
        }

    }
    
    public function render()
    {
        return view('talentohumano::livewire.demographic-data-manager');
    }

    public function update()
    {
        can('demographicdata update');

        $data = [
            'employee_id' => $this->employeeId,
            'politically_exposed' => $this->politically_exposed,
            'public_resources' => $this->public_resources,
            'special_protection' => $this->special_protection,
            'elderly_person' => $this->elderly_person,
            'disabled_person' => $this->disabled_person,
            'victims_conflict' => $this->victims_conflict,
            'extreme_poverty' => $this->extreme_poverty,
            'indigenous_person' => $this->indigenous_person,
            'afro_population' => $this->afro_population,
            'diverse_population' => $this->diverse_population,
            'other_protection' => $this->other_protection,
        ];

        DemographicData::updateOrCreate(
            ['employee_id' => $this->employeeId],
            $data
        );

        $this->dispatch('alert', ['type' => 'success', 'message' => 'Datos demográficos actualizados correctamente.']);
    }
}
        