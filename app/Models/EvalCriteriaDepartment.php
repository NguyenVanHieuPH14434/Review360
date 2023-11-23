<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvalCriteriaDepartment extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'eval_criteria_department';
    protected $fillable = [
        'criteria_id',
        'department_id',
    ];
}
