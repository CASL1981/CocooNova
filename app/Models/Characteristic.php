<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mattiverse\Userstamps\Traits\Userstamps;

class Characteristic extends Model
{
    /** @use HasFactory<\Database\Factories\CharacteristicFactory> */
    use HasFactory;

    use Userstamps;

    protected $fillable = ['name', 'FieldName', 'Modelo'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:d-m-Y H:m:s',
    ];

    public function QueryTable($keyWord, $sortField, $sortDirection): mixed
    {
        return $this->select(['id', 'name', 'FieldName', 'Modelo'])
            ->search('name', $keyWord)
            ->search('FieldName', $keyWord)
            ->search('Modelo', $keyWord)
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
        return $this->select(['name', 'FieldName', 'Modelo'])
            ->search('name', $keyWord)
            ->search('FieldName', $keyWord)
            ->search('Modelo', $keyWord)
            ->orderBy($sortField, $sortDirection);
    }
}
