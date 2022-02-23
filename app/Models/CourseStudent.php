<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Student;

class CourseStudent extends Model
{
    use HasFactory;
    protected $table='coursestudents';
    
    public function course(){
        return $this->belongsTo(Course::class,'c_id');
    }
    public function student(){
        return $this->belongsTo(Student::class,'s_id');
    }
}
