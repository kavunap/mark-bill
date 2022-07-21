<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\TestController;

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

Route::get('/report', function () {
    return view('classroom.report');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::resource('/students', StudentController::class)->middleware('auth');
Route::resource('/schools', SchoolController::class)->middleware('auth');
Route::resource('/classrooms', ClassroomController::class)->middleware('auth');
Route::resource('/courses', CourseController::class)->middleware('auth');
Route::resource('/marks', MarkController::class)->middleware('auth');
Route::resource('/tests', TestController::class)->middleware('auth');
Route::get('/document/{id}', [ClassroomController::class, 'genMission'])->name('generate');

Route::get('/getDocument/{id}', [ClassroomController::class, 'createPDF'])->name('download');
