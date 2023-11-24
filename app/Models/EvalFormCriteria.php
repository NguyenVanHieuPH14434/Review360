<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvalFormCriteria extends Model
{
    use HasFactory;
    public $table = 'eval_form_criteria';
    protected $fillable = [
        'eval_form_id',
        'criteria_id',
        'type_criteria','position','weighting',
    ];
}
