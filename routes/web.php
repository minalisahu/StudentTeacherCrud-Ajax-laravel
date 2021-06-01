<?php

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $teachers = Teacher::latest()->paginate(10);
    return view('teacher.index', compact('teachers'));
})->name('teacher.list');

Route::get('/add-teacher', [App\Http\Controllers\TeacherController::class, 'create'])->name('teacher.create');
Route::post('/store-teacher', [App\Http\Controllers\TeacherController::class, 'store'])->name('teacher.store');
Route::get('/edit-teacher/{teacher}', [App\Http\Controllers\TeacherController::class, 'edit'])->name('teacher.edit');
Route::put('/update-teacher/{teacher}', [App\Http\Controllers\TeacherController::class, 'update'])->name('teacher.update');
Route::get('/show-teacher/{teacher}', [App\Http\Controllers\TeacherController::class, 'show'])->name('teacher.show');
Route::delete('/delete-teacher/{teacher}', [App\Http\Controllers\TeacherController::class, 'destroy'])->name('teacher.destroy');

Route::middleware(['auth:sanctum', 'verified'])->get('/students', function () {
    $students = Student::latest()->paginate(10);
    return view('student.index', compact('students'));
})->name('student.list');
Route::get('/add-student', [App\Http\Controllers\StudentController::class, 'create'])->name('student.create');
Route::post('/store-student', [App\Http\Controllers\StudentController::class, 'store'])->name('student.store');
Route::get('/edit-student/{student}', [App\Http\Controllers\StudentController::class, 'edit'])->name('student.edit');
Route::put('/update-student/{student}', [App\Http\Controllers\StudentController::class, 'update'])->name('student.update');
Route::get('/show-student/{student}', [App\Http\Controllers\StudentController::class, 'show'])->name('student.show');
Route::delete('/delete-student/{student}', [App\Http\Controllers\StudentController::class, 'destroy'])->name('student.destroy');
