<?php

namespace Modules\TalentoHumano\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Mattiverse\Userstamps\Traits\Userstamps;
use Modules\TalentoHumano\App\Enums\ContractType;
use Modules\TalentoHumano\App\Models\Contract;
use Modules\TalentoHumano\Database\Factories\SocialSecurityFactory;

class SocialSecurity extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'humantalent_social_securities';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['contract_id', 'position', 'work_location', 'contract_type', 'salary', 'start_date', 'end_date', 'status',
                         'eps', 'afp', 'risk', 'work_shift', 'updated_by', 'created_by'];

    protected static function newFactory(): SocialSecurityFactory
    {
        return SocialSecurityFactory::new();
    }

    protected $casts = [
        'start_date' => 'date:Y-m-d',
        'end_date' => 'date:Y-m-d',
        'status' => 'boolean',
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:d-m-Y h:i:s',
        'contract_type' => ContractType::class,
        'salary' => 'decimal:2',
    ];

    /**
     * Summary of contract
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class, 'contract_id');
    }

    /**
     * Summary of QueryTable
     * @param mixed $keyWord
     * @param mixed $sortField
     * @param mixed $sortDirection
     * @return mixed
     */
    public function QueryTable($keyWord, $sortField, $sortDirection): mixed
    {
        return $this->select('id', 'contract_id', 'position', 'work_location', 'contract_type', 'salary', 'start_date', 'end_date',
                             'status', 'eps', 'afp', 'risk', 'work_shift', 'updated_by', 'created_by')
            ->with(['creator', 'editor'])
            ->search('position', $keyWord)
            ->search('work_location', $keyWord)
            ->search('eps', $keyWord)
            ->search('afp', $keyWord)
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
        return $this->select('contract_id', 'position', 'work_location', 'contract_type', 'salary', 'start_date', 'end_date',
                             'status', 'eps', 'afp', 'risk', 'work_shift')
            ->search('position', $keyWord)
            ->search('work_location', $keyWord)
            ->search('eps', $keyWord)
            ->search('afp', $keyWord)
            ->orderBy($sortField, $sortDirection);
    }
}
