<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function list(){
        $students = Student::all(); //select * from students and also converts it into collection of student oobject
        /*$students = array();
        for($i=0;$i<10;$i++){
            $student = array(
                "id" => $i+1,
                "name" =>"Student ".($i+1),
                "dept" => "CS"
            );
            $student = (object)$student;
            $students[] = $student;
        }
        $student = array(
            "id" => 11,
            "name" =>"Tanvir Ahmed Shawon Ibn Masud",
            "dept" => "CS"
        );
        $students[] = (object)$student;*/
        return view('student.list')->with('students',$students);
    }
    public function create(){
        return view('student.create');
    }
    public function get(){
        $name = "Tanvir Ahmed";
        $id = "123";
        $courses = ["Pl1","pl2","DS","Algo","OOp1","OOP2","WT","ATP2","ATP3"];
        return view('student.get')
        ->with('name',$name)
        ->with('id',$id)
        ->with('courses',$courses);
    }
    public function details(Request $req){
        $student = Student::where('id',decrypt($req->id))
        ->first();
         return view('student.get')->with('s',$student);
    }
    public function edit(Request $req){
       
        $student = Student::where('id',decrypt($req->id))
        ->first();
        return $student->department;
        //generate edit page in blade
    }

    //if its your edit submit function
    public function editSubmit(Request $req){

        $st = Student::where('id',$req->id)->first();
        $st->name = $req->name;
        $st->username = $req->username;
        $st->email = $req->email;

        $st->save(); //update
    }

}
