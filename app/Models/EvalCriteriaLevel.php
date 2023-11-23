<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvalCriteriaLevel extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'eval_criteria_level';
    protected $fillable = [
        'criteria_id',
        'level',
    ];
}
