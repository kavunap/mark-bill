<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\BehaviorController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

// Route::get('/report', function () {
//     return view('classroom.report');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::resource('/students', StudentController::class)->middleware('auth');
Route::resource('/schools', SchoolController::class)->middleware(['auth']);
Route::resource('/classrooms', ClassroomController::class)->middleware('auth');
Route::resource('/courses', CourseController::class)->middleware('auth');
Route::resource('/marks', MarkController::class)->middleware('auth');
Route::resource('/tests', TestController::class)->middleware('auth');
Route::get('/document/{id}', [ClassroomController::class, 'genReport'])->name('generate');

Route::get('/getDocument/{id}/{term}', [ClassroomController::class, 'createPDF'])->name('download');
// Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

// Email verification
// Route::get('/email/verify', function () {
//     return view('auth.verify');
// })->middleware('auth')->name('verification.notice');

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
 
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
 
//     return redirect('/schools');
// })->middleware(['auth', 'signed'])->name('verification.verify');
Route::resource('/users', UserController::class)->middleware('auth');
Route::resource('/archives', ArchiveController::class)->middleware('auth');

Route::get('/user_dashobard', [UserController::class, 'dashboard'])->middleware('auth')->name('dashboard.index');
Route::get('/student_list', [StudentController::class, 'list'])->middleware('auth')->name('student.list');
Route::get('/student_excel/{classroom}', [StudentController::class, 'excel_list'])->middleware('auth')->name('student.excel');
Route::resource('/behaviors', BehaviorController::class);
Route::get('/add-behavior/{student}', [BehaviorController::class, 'add_behavior'])->middleware('auth')->name('student.addBehavior');
Route::get('/beh-list', [BehaviorController::class, 'list'])->middleware('auth')->name('beh.list');
Route::get('/beh-class/{classroom_id}', [BehaviorController::class, 'classList'])->middleware('auth')->name('beh.classList');
Route::get('/student-search', [ClassroomController::class, 'searchStudent'])->middleware('auth')->name('st.search');
Route::get('/user/teacher', [UserController::class, 'teachers'])->middleware('auth')->name('users.teacher');
Route::post('users/update', [UserController::class, 'inline_update'])->name('users.inline_update');
Route::post('marks/update', [MarkController::class, 'inline_update'])->name('marks.inline_update');