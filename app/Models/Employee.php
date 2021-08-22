<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function attendance(){
        return $this->belongsTo('App\Models\Attendance', 'employee_id', 'id');
    }
    
    public function attendances(){
        return $this->hasMany('App\Models\Employee', 'id', 'employee_id');
    }
}
