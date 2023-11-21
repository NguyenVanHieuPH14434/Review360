<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class AssessmentPeriod extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "assessment_period";
    protected $fillable = [
        'title',
        'description',
        'status','start_date','end_date','type_eval','eval_copy_id','setting_result_eval','setting_point_eval'
    ];

    public function setStartDateAttribute($value) {
        $this->attributes['start_date'] = Carbon::createFromFormat('d/m/Y',$value)->format('Y-m-d');
    }

    public function setEndDateAttribute($value) {
        $this->attributes['end_date'] = Carbon::createFromFormat('d/m/Y',$value)->format('Y-m-d');
    }
}
