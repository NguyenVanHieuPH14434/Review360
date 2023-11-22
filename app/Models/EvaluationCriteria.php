<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationCriteria extends Model
{
    use HasFactory;

    protected $table = "eval_criteria";
    protected $fillable = [
        'criteria_code',
        'criterion_level',
        'title',
        'description',
        'cat_criteria',
        'status',
    ];
}