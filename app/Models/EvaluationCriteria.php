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
        'type_criteria'
    ];

    public function evalCriPoint(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(EvaluationCriteriaPoint::class,'criteria_id', 'id');
    }

    public function catCri(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CategoryCriteria::class,'cat_criteria', 'id');
    }
    
    public function catCriteria()
    {
        return $this->belongsTo(CategoryCriteria::class, 'cat_criteria', 'id');
    }

    public function criteriaPoint()
    {
        return $this->hasMany(EvaluationCriteriaPoint::class, 'criteria_id', 'id');
    }
}
