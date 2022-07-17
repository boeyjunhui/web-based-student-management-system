<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ExamMarkController;

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

// welcome
Route::get('/', function () {
    return view('welcome');
});

// student crud
Route::controller(StudentController::class)->group(function () {
    Route::get('student', 'readStudent');
    Route::view('student/add', 'student/add_student');
    Route::get('student/add', 'getCourse');
    Route::post('student/add', 'createStudent');
    Route::get('student/edit/{id}', 'getStudent');
    Route::post('student/edit', 'updateStudent');
    Route::get('student/delete/{id}', 'deleteStudent');
    Route::get('student/student-list', 'exportStudentList');
});

// course crud
Route::controller(CourseController::class)->group(function () {
    Route::get('course', 'readCourse');
    Route::view('course/add', 'course/add_course');
    Route::post('course/add', 'createCourse');
    Route::get('course/edit/{id}', 'getCourse');
    Route::post('course/edit', 'updateCourse');
    Route::get('course/delete/{id}', 'deleteCourse');
    Route::get('course/course-list', 'exportCourseList');
});

// subject crud
Route::controller(SubjectController::class)->group(function () {
    Route::get('subject', 'readSubject');
    Route::view('subject/add', 'subject/add_subject');
    Route::get('subject/add', 'getCourse');
    Route::post('subject/add', 'createSubject');
    Route::get('subject/edit/{id}', 'getSubject');
    Route::post('subject/edit', 'updateSubject');
    Route::get('subject/delete/{id}', 'deleteSubject');
    Route::get('subject/subject-list', 'exportSubjectList');
});

// exam mark crud
Route::controller(ExamMarkController::class)->group(function () {
    Route::get('exammark', 'readExamMark');
    Route::get('exammark/add/{id}', 'getData');
    Route::post('exammark/add', 'createExamMark');
    Route::get('exammark/edit/{id}', 'getExamMark');
    Route::post('exammark/edit', 'updateExamMark');
    Route::get('exammark/delete/{id}', 'deleteExamMark');
    Route::get('exammark/student-exam-mark-report', 'exportStudentExamMarkReport');
    Route::get('exammark/subject-exam-mark-report', 'exportSubjectExamMarkReport');
});