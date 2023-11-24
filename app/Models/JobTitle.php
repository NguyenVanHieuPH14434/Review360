<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobTitle extends Model
{
    use HasFactory;

    protected $table = "job_title";

    protected $fillable = [
        'job_title_code',
        'title',
        'description',
        'status',
    ];

    public function evalForm(): HasMany
    {
        return $this->hasMany(EvalForm::class,'job_title_id');
    }
}
