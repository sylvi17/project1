<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminClassroomController;
use App\Http\Controllers\Admin\AdminStudentsController;
use App\Http\Controllers\Admin\AdminTeacherController;
use App\Http\Controllers\Admin\AdminSubjectController;
use App\Http\Controllers\Admin\AdminGuardianController;

// Route::get('/', [HomeController::class, 'index']);

Route::get('/profil',[ProfilController::class,'profil']);
Route::get('/kontak',[KontakController::class,'kontak',]);

Route::get('/home',[HomeController::class,'index'] )->name('home');

Route::get('/students',[StudentsController::class,'index']);
Route::get('/guardians',[GuardianController::class,'index']);
Route::get('/classrooms',[ClassroomController::class,'index']);
Route::get('/teachers',[TeacherController::class,'index']);
Route::get('/subjects',[SubjectController::class,'index']);

// Route::view('/dashboard','admin.dashboard');



Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class,'login'])->name('login.process');
});
Route::middleware('auth')->group(function (){
    Route::post('/logout', [AuthController::class,'logout'])->name('logout');
    Route::get('/dashboard', function (){
        return view('admin.dashboard');
    })->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('students', AdminStudentsController::class);
        Route::resource('teachers', AdminTeacherController::class);
        Route::resource('classrooms', AdminClassroomController::class)->except(['destroy']);
        Route::resource('subjects', AdminSubjectController::class);
        Route::resource('guardians', AdminGuardianController::class);
    });
});

