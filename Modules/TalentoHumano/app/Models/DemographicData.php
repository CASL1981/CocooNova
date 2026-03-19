<?php

namespace Modules\TalentoHumano\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mattiverse\Userstamps\Traits\Userstamps;
use Modules\TalentoHumano\Database\Factories\DemographicDataFactory;

class DemographicData extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'humantalent_demographic_data';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['employee_id', 'politically_exposed', 'public_resources', 'special_protection', 'elderly_person',
                           'disabled_person', 'victims_conflict', 'extreme_poverty', 'indigenous_person', 'afro_population', 
                           'diverse_population', 'other_protection'];

    protected static function newFactory(): DemographicDataFactory
    {
        return DemographicDataFactory::new();
    }

    protected $casts = [
        'politically_exposed' => 'boolean',
        'public_resources' => 'boolean',
        'special_protection' => 'boolean',
        'elderly_person' => 'boolean',
        'disabled_person' => 'boolean',
        'victims_conflict' => 'boolean',
        'extreme_poverty' => 'boolean',
        'indigenous_person' => 'boolean',
        'afro_population' => 'boolean',
        'diverse_population' => 'boolean',
        'other_protection' => 'boolean',
    ];  

    
}
