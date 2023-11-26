<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "users";

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id', 
        'job_title_id',
        'department_id', 
        'code', 
        'email_verified_at',
        'direct_management',
        'work_start_date',
        'avatar',
        'status',
        'remember_token',
        'level'
    ];

    const ACTIVE = 1;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getJobTitle()
    {
        return $this->belongsTo(JobTitle::class, 'job_title_id', 'id');
    }

    public function getDepartment()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function getManagement()
    {
        return $this->belongsTo(User::class, 'direct_management', 'id');
    }

    public function setWorkStartDateAttribute($value) 
    {
        $this->attributes['work_start_date'] = Carbon::createFromFormat('d/m/Y',$value)->format('Y-m-d');
    }

    public function getWorkStartDateAttribute() 
    {
        return (Carbon::parse($this->attributes['work_start_date']))->format('d/m/Y');
    }

    public function setStatusAttribute($value) 
    {
        $this->attributes['status'] = $value ?? self::ACTIVE;
    }

    public function setPasswordAttribute($value) 
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
