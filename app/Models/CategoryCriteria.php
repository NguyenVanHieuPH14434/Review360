<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryCriteria extends Model
{
    use HasFactory;
    protected $table = "category_criteria";
    protected $fillable = [
        'title',
        'description',
        'status'
    ];
}
