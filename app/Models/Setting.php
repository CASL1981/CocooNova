<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mattiverse\Userstamps\Traits\Userstamps;

class Setting extends Model
{
    /** @use HasFactory<\Database\Factories\SettingFactory> */
    use HasFactory;
    use Userstamps;

    protected $fillable = ['modelo', 'feature', 'value', 'min', 'max', 'status' ];

    public function QueryTable($keyWord = null, $sortField, $sortDirection): mixed
    {
        return $this->select('id','modelo', 'feature', 'value', 'min', 'max', 'status')
        ->search('modelo', $keyWord)
        ->search('feature', $keyWord)
        ->search('status', $keyWord)
        ->orderBy($sortField, $sortDirection);
    }
}
