<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Student extends Model
{
    use HasFactory;
    protected $table='students_info';
    //protected $primaryKey = 'student_id'
    //public $incrementing = false;
    //protected $keyType='string';
    //protected $connection='mysql2';

    public $timestamps=false;

    public function department(){
        return $this->belongsTo(Department::class,'dept_id');
        //return $this->belongsTo(Customer::class,'ordered_by','username');
    }
}
