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
    public function register(){
        return view('home.logins.registration');
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
            'name'=>'required|regex:/^[A-Z a-z]+$/',
            'username'=>'required|min:5|max:20|unique:students,username',
            'email'=>'required|email|unique:students,email',
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
        $st->password = $req->password;
        $st->save();

        return "<h1>The form is submitted with $req->name</h1>";
    }
}
