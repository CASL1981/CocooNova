<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Scope a query to only include users of a given type.
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string|null $keyWord
     * @param string $sortField
     * @param string $sortDirection
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function QueryTable($keyWord = null, $sortField, $sortDirection): mixed
    {
        return $this->select('name')
        ->search('name', $keyWord)
        ->orderBy($sortField, $sortDirection);
    }

    /**
     * Scope a query to only include users of a given type.
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string|null $keyWord
     * @param string $sortField
     * @param string $sortDirection
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function QueryExport($keyWord = null, $sortField, $sortDirection): mixed
    {
        return $this->select('name')
        ->search('name', $keyWord)
        ->orderBy($sortField, $sortDirection);
    }
}
