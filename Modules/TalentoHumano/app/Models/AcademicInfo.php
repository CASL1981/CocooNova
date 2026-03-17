<?php

namespace Modules\TalentoHumano\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mattiverse\Userstamps\Traits\Userstamps;
use Modules\TalentoHumano\App\Models\Employee;
use Modules\TalentoHumano\Database\Factories\AcademicInfoFactory;

class AcademicInfo extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'humantalent_academic_infos';

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['employee_id', 'academic_modality', 'graduate', 'degree_obtained', 'educational_institution', 
                            'duration', 'completion_date', 'professional_license', 'created_by', 'updated_by'];

    protected $casts = [
        'completion_date' => 'date',
        'graduate'        => 'boolean',
        'created_by'      => 'datetime:Y-m-d h:i:s',
        'updated_by'      => 'datetime:d-m-Y h:i:s',
    ];
    
    protected static function newFactory(): AcademicInfoFactory
    {
        return AcademicInfoFactory::new();
    }

    /**
    * @param  string|null  $keyWord
    * @param  string  $sortField
    * @param  string  $sortDirection
    * @return \Illuminate\Database\Eloquent\Builder
    */  
    public function QueryTable($keyWord, $sortField, $sortDirection): mixed{
        return $this->select('id', 'employee_id', 'academic_modality', 'graduate', 'degree_obtained', 'educational_institution', 
                            'duration', 'completion_date', 'professional_license')
            ->with(['creator', 'editor'])
            ->search('academic_modality', $keyWord)
            ->search('degree_obtained', $keyWord)
            ->search('educational_institution', $keyWord)
            ->orderBy($sortField, $sortDirection);
    }

    /**
    * @param  string|null  $keyWord
    * @param  string  $sortField
    * @param  string  $sortDirection
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function QueryExport($keyWord, $sortField, $sortDirection): mixed{
        return $this->select('id', 'employee_id', 'academic_modality', 'graduate', 'degree_obtained', 'educational_institution', 
                            'duration', 'completion_date', 'professional_license')
            ->with(['creator', 'editor'])
            ->search('academic_modality', $keyWord)
            ->search('degree_obtained', $keyWord)
            ->search('educational_institution', $keyWord)
            ->orderBy($sortField, $sortDirection);
    }

    // ---- Relationships ----

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
