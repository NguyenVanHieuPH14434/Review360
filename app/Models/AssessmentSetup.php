<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentSetup extends Model
{
    use HasFactory;

    protected $table = "assessment_setup";
    protected $fillable = [
        'nunber_level',
    ];
}
