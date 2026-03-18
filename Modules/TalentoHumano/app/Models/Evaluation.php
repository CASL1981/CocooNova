<?php

namespace Modules\TalentoHumano\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mattiverse\Userstamps\Traits\Userstamps;
use Modules\TalentoHumano\App\Models\Employee;
use Modules\TalentoHumano\Database\Factories\EvaluationFactory;

class Evaluation extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'humantalent_evaluations';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['employee_id', 'type', 'start_date', 'end_date', 'date', 'result', 'interpretation',
                           'created_by', 'updated_by'];

    protected static function newFactory(): EvaluationFactory
    {
        return EvaluationFactory::new();
    }

    protected $casts = [
        'start_date' => 'date:d-m-Y',
        'end_date'   => 'date:d-m-Y',
        'date'       => 'date:d-m-Y',
        'result'     => 'decimal:1',
        'created_by' => 'datetime:Y-m-d h:i:s',
        'updated_by' => 'datetime:d-m-Y h:i:s',
    ];


    // ---- Relationships ----

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * @param  string|null  $keyWord
     * @param  string  $sortField
     * @param  string  $sortDirection
     * @return \Illuminate\Database\Eloquent\Builder    
     */
    public function QueryTable($keyWord, $sortField, $sortDirection): mixed{
        return $this->select('id', 'employee_id', 'type', 'start_date', 'end_date', 'date', 'result', 'interpretation')
            ->with(['creator', 'editor'])
            ->search('type', $keyWord)
            ->orderBy($sortField, $sortDirection);
    }

    /**
     * @param  string|null  $keyWord
     * @param  string  $sortField
     * @param  string  $sortDirection
     * @return \Illuminate\Database\Eloquent\Builder    
     */
    public function QueryExport($keyWord, $sortField, $sortDirection): mixed{
        return $this->select('type', 'start_date', 'end_date', 'date', 'result', 'interpretation')
            ->with(['creator', 'editor'])
            ->search('type', $keyWord)
            ->orderBy($sortField, $sortDirection);
    }
}
