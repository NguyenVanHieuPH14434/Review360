<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvalCriteriaUsers extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'eval_criteria_users';
    protected $fillable = [
        'criteria_id',
        'user_id',
    ];
}
