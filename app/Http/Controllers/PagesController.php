<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class PagesController extends Controller
{
    //
    public function login(){
        return view('home.logins.login');
    }
    public function loginSubmit(Request $req){
        $st = Student::where('username',$req->uname)->where('password',md5($req->pass))->first();
        if($st) {
           session()->put('username',$st->username);
           session()->flash('msg','login successful');
           return redirect()->route('student.list');
           //session()->get('username')
           //session()->has('username')
           //session()->forget('username'),session()->forget(['id','username'])
           //session()->flush()  --->session destroy
           //session()->flash('key',value)  ---> This will store the value in session key for sub sequent request
        }
        else return "Login Failed";
    }
    public function register(){
        return view('home.logins.registration');
    }
    public function list(){
        
    }
    public function registersubmit(Request $req)
    {
       
        /*$req->validate(
            [
                'name'=>'required|regex:/^[A-Z a-z]+$/',
                'username'=>'required|min:5|max:20',
                'email'=>'required|email',
                'password'=>'required|min:8',
                'conf_password'=>'required|same:password'
            ],
            [
                'username.required'=>'Please provide username',
                'username.max'=>'Username must not exceed 20 alphabets',
                'conf_password.same'=>'Password and confirm password must match'

            ]
        );*/

        $this->validate($req,
        [
            'name'=>'required|regex:/^[A-Z a-z.]+$/',
            'username'=>'required|min:5|max:20|unique:students_info,username',
            'email'=>'required|email|unique:students_info,email',
            'password'=>'required|min:8',
            'conf_password'=>'required|same:password'
        ],
        [
            'username.required'=>'Please provide username',
            'username.max'=>'Username must not exceed 20 alphabets',
            'conf_password.same'=>'Password and confirm password must match'

        ]
    );
        $st = new Student();
        $st->name = $req->name;
        $st->username = $req->username;
        $st->email = $req->email;
        $st->password = md5($req->password);
        $st->save(); //runs query in db

        return "<h1>The form is submitted with $req->name</h1>";
    }
    public function logout(){
        session()->flush();
        return redirect()->route('login');
    }
}
