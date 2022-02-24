<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\StudentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/login',function(){
    return view('home.logins.login');
});*/

Route::get('/login',[PagesController::class,'login'])->name('login');
Route::post('/login',[PagesController::class,'loginSubmit'])->name('login');
Route::get('/register',[PagesController::class,'register']);

Route::get('/add/student',[StudentController::class,'create'])->name('student.create');
Route::get('/student/list',[StudentController::class,'list'])->name('student.list')->middleware('authorized');
Route::get('/student/get',[StudentController::class,'get']);

Route::get('/student/details/{id}',[StudentController::class,'details'])->name('student.details');

Route::post('/register',[PagesController::class,'registersubmit'])->name('register.submit');
Route::get('/students/list',[PagesController::class,'list'])->name('students.list');
Route::get('/student/edit/{id}',[StudentController::class,'edit'])->name('students.edit');
Route::get('/logout',[PagesController::class,'logout'])->name('logout');