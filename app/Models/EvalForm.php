<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EvalForm extends Model
{
    use HasFactory;
    public $table = 'eval_form';
    protected $fillable = [
        'department_id',
        'job_title_id',
        'level_id','user_id','job_title_id','status',
    ];

    public function evalFormCri(): HasMany
    {
        return $this->hasMany(EvalFormCriteria::class,'eval_form_id', 'id');
    }

    public function jobTitle(): BelongsTo
    {
        return $this->belongsTo(JobTitle::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

}
