<?php

namespace Modules\TalentoHumano\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mattiverse\Userstamps\Traits\Userstamps;

use Modules\TalentoHumano\Database\Factories\WorkExperienceFactory;

class WorkExperience extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'humantalent_work_experiences';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['employee_id', 'company', 'nature', 'position', 'immediate_supervisor', 'start_date', 'end_date',
                        'time_service', 'city', 'phone', 'contract_type', 'salary', 'main_duties', 'reason_for_leaving',
                        'created_by', 'updated_by'];

    protected $casts = [
        'start_date'  => 'date:d-m-Y',
        'end_date'    => 'date:d-m-Y',
        'created_by' => 'datetime:d-m-Y h:i:s',
        'updated_by' => 'datetime:d-m-Y h:i:s',
        'salary'      => 'decimal:2',
    ];

    protected static function newFactory(): WorkExperienceFactory
    {
        return WorkExperienceFactory::new();
    }

    /**
     * @param  string|null  $keyWord
     * @param  string  $sortField
     * @param  string  $sortDirection
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function QueryTable($keyWord, $sortField, $sortDirection): mixed
    {
        return $this->select('id', 'employee_id', 'company', 'nature', 'position', 'immediate_supervisor', 'start_date', 'end_date',
                        'time_service', 'city', 'phone', 'contract_type', 'salary', 'main_duties', 'reason_for_leaving')
            ->with(['creator', 'editor'])
            ->search('company', $keyWord)
            ->search('position', $keyWord)
            ->orderBy($sortField, $sortDirection);
    }

    /**
     * @param  string|null  $keyWord
     * @param  string  $sortField
     * @param  string  $sortDirection
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function QueryExport($keyWord, $sortField, $sortDirection): mixed
    {
        return $this->select('company', 'nature', 'position', 'immediate_supervisor', 'start_date', 'end_date',
                        'time_service', 'city', 'phone', 'contract_type', 'salary', 'main_duties', 'reason_for_leaving')
            ->search('company', $keyWord)
            ->search('position', $keyWord)
            ->orderBy($sortField, $sortDirection);
    }


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
