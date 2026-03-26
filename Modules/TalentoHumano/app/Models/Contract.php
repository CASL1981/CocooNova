<?php

namespace Modules\TalentoHumano\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mattiverse\Userstamps\Traits\Userstamps;
use Modules\TalentoHumano\App\Models\Employee;
use Modules\TalentoHumano\Database\Factories\ContractFactory;

class Contract extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'humantalent_contracts';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['employee_id', 'identification', 'full_name', 'hiring_date', 'termination_date', 'format', 'observations',
                          'city', 'type', 'probationary_period', 'salary', 'work_schedule', 'status', 'period', 'year',
                          'reason_leaving', 'destination', 'created_by', 'updated_by'];

    protected static function newFactory(): ContractFactory
    {
        return ContractFactory::new();
    }

    protected $casts = [
        'hiring_date' => 'date:Y-m-d',
        'termination_date' => 'date:Y-m-d',
        'status' => 'boolean',
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:d-m-Y h:i:s',
    ];

    /**
     * Summary of QueryTable
     * @param mixed $keyWord
     * @param mixed $sortField
     * @param mixed $sortDirection
     * @return mixed
     */
    public function QueryTable($keyWord, $sortField, $sortDirection): mixed
    {
        return $this->select('id', 'identification', 'full_name', 'hiring_date', 'termination_date', 'format', 'observations',
                    'city', 'type', 'probationary_period', 'salary', 'work_schedule', 'reason_leaving', 'destination', 'status',
                    'period', 'year')
            ->with(['creator', 'editor'])
            ->search('identification', $keyWord)
            ->search('full_name', $keyWord)
            ->orderBy($sortField, $sortDirection);
    }

    /**
     * Summary of queryExport
     * @param mixed $keyWord
     * @param mixed $sortField
     * @param mixed $sortDirection
     * @return mixed
     */
    public function queryExport($keyWord, $sortField, $sortDirection): mixed
    {
        return $this->select('identification', 'full_name', 'hiring_date', 'termination_date', 'format', 'observations',
                    'city', 'type', 'probationary_period', 'salary', 'work_schedule', 'reason_leaving', 'destination', 'status', 
                    'period', 'year')
            ->with(['creator', 'editor'])
            ->search('identification', $keyWord)
            ->search('full_name', $keyWord)
            ->orderBy($sortField, $sortDirection);
    }
}
