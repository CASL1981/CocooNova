<?php

namespace Modules\TalentoHumano\App\Models;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Mattiverse\Userstamps\Traits\Userstamps;
use Modules\TalentoHumano\Database\Factories\EmployeeFactory;

// use Modules\TalentoHumano\Database\Factories\EmployeeFactory;

class Employee extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'humantalent_employees';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['type_document', 'identification', 'expedition_department', 'expedition_city', 'first_name', 'last_name',
        'military_service', 'type_militart', 'district', 'department', 'city', 'address', 'estrato', 'type_housing', 'number_children',
        'cel_phone', 'cel_phone2', 'email', 'gender', 'birth_date', 'department_birth', 'city_birth', 'destination_id',
        'photo_path', 'blood_type', 'marital_status', 'position', 'area', 'vendedor', 'status', 'auditor', 'approve'];

    protected static function newFactory(): EmployeeFactory
    {
        return EmployeeFactory::new();
    }

    protected $casts = [
        'birth_date' => 'date:Y-m-d',
        'vendedor' => 'boolean',
        'status' => 'boolean',
        'auditor' => 'boolean',
        'approve' => 'boolean',
        'number_children' => 'integer',
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:d-m-Y h:i:s',
    ];

    public function QueryTable($keyWord, $sortField, $sortDirection): mixed
    {
        return $this->select('id', 'type_document', 'identification', 'expedition_department', 'expedition_city', 'first_name', 'last_name',
            'military_service', 'type_militart', 'district', 'department', 'city', 'address', 'estrato', 'type_housing', 'number_children',
            'cel_phone', 'cel_phone2', 'email', 'gender', 'birth_date', 'department_birth', 'city_birth', 'destination_id',
            'photo_path', 'blood_type', 'marital_status', 'position', 'area', 'vendedor', 'status', 'auditor', 'approve')
            ->with(['creator', 'editor'])
            ->search('first_name', $keyWord)
            ->search('last_name', $keyWord)
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
        return $this->select(['type_document', 'identification', 'expedition_department', 'expedition_city', 'first_name', 'last_name',
            'military_service', 'type_militart', 'district', 'department', 'city', 'address', 'estrato', 'type_housing', 'number_children',
            'cel_phone', 'cel_phone2', 'email', 'gender', 'birth_date', 'department_birth', 'city_birth', 'destination_id',
            'photo_path', 'blood_type', 'marital_status', 'position', 'area', 'vendedor', 'status', 'auditor', 'approve'])
            ->search('first_name', $keyWord)
            ->search('last_name', $keyWord)
            ->orderBy($sortField, $sortDirection);
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }
}
