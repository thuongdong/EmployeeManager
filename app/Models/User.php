<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    const leader = 1;
    const employee = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
        'birthday',
    ];
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'birthday',
        'avatar',
        'sex',
        'level_japanese',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function attentions() {
        return $this->hasMany(Attention::class);
    }

    public function vacationFullTimes() {
        return $this->hasMany(VacationFullTime::class);
    }

    public function vacationPartTimes() {
        return $this->hasMany(VacationPartTime::class);
    }

    public function reports() {
        return $this->hasMany(Report::class);
    }

    public function overTime() {
        return $this->hasMany(Overtime::class);
    }

    public function salaries() {
        return $this->hasMany(Salary::class);
    }      
}
