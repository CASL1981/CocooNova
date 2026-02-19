<?php

namespace Modules\TalentoHumano\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mattiverse\Userstamps\Traits\Userstamps;
use Modules\TalentoHumano\App\Models\Employee;
use Modules\TalentoHumano\Database\Factories\FamilyGroupFactory;

// use Modules\TalentoHumano\Database\Factories\FamilyGroupFactory;

class FamilyGroup extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'humantalent_family_groups';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['employee_id', 'employee_fullName', 'name', 'kinship', 'profession', 'occupation', 'company', 'education_level',
                            'birth_date', 'illness', 'phone'];

    protected static function newFactory(): FamilyGroupFactory
    {
        return FamilyGroupFactory::new();
    }

    protected $casts = [
        'birth_date' => 'date:Y-m-d',
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:d-m-Y h:i:s',
    ];

    /**
     * @param  string|null  $keyWord
     * @param  string  $sortField
     * @param  string  $sortDirection
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function QueryTable($keyWord, $sortField, $sortDirection): mixed
    {
        return $this->select('id', 'employee_id', 'name', 'kinship', 'profession', 'occupation', 'company', 'education_level',
                            'birth_date', 'illness', 'phone')
            ->with(['creator', 'editor'])
            ->search('name', $keyWord)
            ->search('kinship', $keyWord)
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
        return $this->select('id', 'employee_id', 'name', 'kinship', 'profession', 'occupation', 'company', 'education_level',
                            'birth_date', 'illness', 'phone')
            ->search('name', $keyWord)
            ->search('kinship', $keyWord)
            ->orderBy($sortField, $sortDirection);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
