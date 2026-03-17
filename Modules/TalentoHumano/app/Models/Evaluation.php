<?php

namespace Modules\TalentoHumano\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\TalentoHumano\Database\Factories\EvaluationFactory;

class Evaluation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): EvaluationFactory
    // {
    //     // return EvaluationFactory::new();
    // }
}
