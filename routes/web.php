<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;

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
Route::prefix('/admin')->group(function(){
Route::match(['get', 'post'], '/login',[App\Http\Controllers\Admin\AdminLoginController::class, 'adminLogin'])->name('adminLogin');
        
Route::group(['middleware'=> ['admin']] ,function () {
Route::get('/dashboard', [App\Http\Controllers\Admin\AdminLoginController::class, 'dashboard'])->name('adminDashboard');     
 });
});
//Category
Route::get('/Category/add', [App\Http\Controllers\Admin\CategoryController::class, 'addCategory'])->name('addCategory');
Route::get('/Category/index', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('index');
Route::post('/Category/store', [App\Http\Controllers\Admin\CategoryController::class, 'storeCategory'])->name('storeCategory');
Route::get('/Category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'editCategory'])->name('editCategory');
Route::post('/Category/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'updateCategory'])->name('updateCategory');
Route::get('/Category/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('deleteCategory');
Route::get('/Category/table', [App\Http\Controllers\Admin\CategoryController::class, 'dataTable'])->name('tableCategory');

//course
Route::get('/Course/add', [App\Http\Controllers\Admin\CourseController::class, 'addCourse'])->name('addCourse');
Route::get('/Course/index', [App\Http\Controllers\Admin\CourseController::class, 'index'])->name('index');
Route::post('/Course/store', [App\Http\Controllers\Admin\CourseController::class, 'storeCourse'])->name('storeCourse');
Route::get('/Course/edit/{id}', [App\Http\Controllers\Admin\CourseController::class, 'editCourse'])->name('editCourse');
Route::post('/Course/update/{id}', [App\Http\Controllers\Admin\CourseController::class, 'updateCourse'])->name('updateCourse');
Route::get('/Course/delete/{id}', [App\Http\Controllers\Admin\CourseController::class, 'delete'])->name('deleteCourse');
Route::get('/Course/table', [App\Http\Controllers\Admin\CourseController::class, 'dataTable'])->name('tableCourse');

//Student
Route::get('/add-Student', [App\Http\Controllers\Admin\StudentController::class, 'addStudent'])->name('addStudent');
Route::get('/Student/index', [App\Http\Controllers\Admin\StudentController::class, 'index'])->name('student.index');
Route::post('/Student/store', [App\Http\Controllers\Admin\StudentController::class, 'storeStudent'])->name('storeStudent');
Route::get('/Student/table', [App\Http\Controllers\Admin\StudentController::class, 'dataTable'])->name('tableStudent');
Route::get('Student/edit/{id}', [App\Http\Controllers\Admin\StudentController::class, 'editStudent'])->name('editStudent');
Route::post('/Student/update/{id}', [App\Http\Controllers\Admin\StudentController::class, 'updateStudent'])->name('updateStudent');
Route::get('/Student/delete/{id}', [App\Http\Controllers\Admin\StudentController::class, 'deleteStudent'])->name('deleteStudent');