<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    use HasFactory;
    
    protected $table = "job_title";

    protected $fillable = [
        'job_title_code',
        'title',
        'description',
        'status',
        'is_deleted'
    ];
}