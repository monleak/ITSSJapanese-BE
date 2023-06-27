<?php

use App\Http\Controllers\CourseAndStudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RegisterCourseController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CourseController::class,'index']);

Route::controller(CourseController::class)->group(function () {
    Route::get('/course/{listing}', 'show');
    Route::post('/course/list', 'list');
    Route::post('/course','create');
    Route::patch('/course/{id}','update');
    Route::delete('/course/{id}','destroy');
});

Route::controller(TeacherController::class)->group(function () {
    Route::get('/teacher/{id}', 'show');
    Route::get('/teacher', 'list');
    Route::post('/teacher','create');
    Route::patch('/teacher/{id}','update');
    Route::delete('/teacher/{id}','destroy');
});

Route::controller(CourseAndStudentController::class)->group(function () {
    Route::post('/addStudentToCourse','addStudentToCourse');
});

Route::controller(RegisterCourseController::class)->group(function () {
    Route::post('/requestToCourse','requestToCourse');
    Route::post('/listRequest','listRequest');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
