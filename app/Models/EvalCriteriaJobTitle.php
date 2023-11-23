<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvalCriteriaJobTitle extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'eval_criteria_job_title';
    protected $fillable = [
        'criteria_id',
        'job_title_id',
    ];
}
