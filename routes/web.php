<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\ExamController@create')->name('exam.create');
Route::post('/', 'App\Http\Controllers\ExamController@store')->name('exam.store');


// Route::get('/', 'App\Http\Controllers\TestController@listTest')->name('test.list');
// Route::post('/', 'App\Http\Controllers\ExamController@store')->name('exam.store');




// Registration routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register');

// Login routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::get('/quiz/create/{examId}', 'App\Http\Controllers\QuizController@create')->name('quiz.create');
Route::post('/quiz/store/{examId}', 'App\Http\Controllers\QuizController@store')->name('quiz.store');



Route::get("student/", 'App\Http\Controllers\TestController@listTest')->name('test.list');

Route::get('/student/test/{id}', 'App\Http\Controllers\TestController@create')->name('student.test');
Route::post("student/test/{id}", 'App\Http\Controllers\TestController@store')->name('student.create');


