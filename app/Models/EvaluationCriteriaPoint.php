<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationCriteriaPoint extends Model
{
    use HasFactory;

    protected $table = "eval_criteria_point";
    public $timestamps = false;
    protected $fillable = [
        'criteria_id',
        'point',
        'description',
    ];
}
