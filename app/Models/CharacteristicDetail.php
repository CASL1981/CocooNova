<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacteristicDetail extends Model
{
    /** @use HasFactory<\Database\Factories\CharacteristicDetailFactory> */
    use HasFactory;

    protected $fillable = ['characteristic_id', 'name', 'abbreviation', 'code', 'value', 'percentage', 'max', 'min', 'stock', 'status'];

    protected $casts = [
        'value' => 'decimal:2',
        'percentage' => 'decimal:2',
        'max' => 'integer',
        'min' => 'integer',
        'stock' => 'integer',
        'status' => 'boolean',
    ];

    public function characteristic()
    {
        return $this->belongsTo(Characteristic::class);
    }

    public function QueryTable($keyWord, $sortField, $sortDirection): mixed
    {
        return $this->with('characteristic')
            ->select(['id', 'characteristic_id', 'name', 'abbreviation', 'code', 'value', 'percentage', 'max', 'min', 'stock', 'status'])
            ->search('name', $keyWord)
            ->search('abbreviation', $keyWord)
            ->search('code', $keyWord)
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
        return $this->with('characteristic')
            ->select(['id', 'characteristic_id', 'name', 'abbreviation', 'code', 'value', 'percentage', 'max', 'min', 'stock', 'status', 'created_at', 'updated_at'])
            ->search('name', $keyWord)
            ->search('abbreviation', $keyWord)
            ->search('code', $keyWord)
            ->orderBy($sortField, $sortDirection);
    }
}
